<?php
defined('ISHOP') or die('Access denied');

function printarr($array) {
	echo "<pre>";
	print_r($array);
	echo "</pre>";
}

function addtocart($goods_id){
	if(isset($_SESSION['cart'][$goods_id])){
		$_SESSION['cart'][$goods_id]++;
		return $_SESSION['cart'];
	}
	else{
		$_SESSION['cart'][$goods_id] = 1;
		return $_SESSION['cart'];
	}
}

function adtocart($goods_id, $qty = 1){
    if(isset($_SESSION['cart'][$goods_id])){
        // если в массиве cart уже есть добавляемый товар
        $_SESSION['cart'][$goods_id]['qty'] += $qty;
        return $_SESSION['cart'];
    }else{
        // если товар кладется в корзину впервые
        $_SESSION['cart'][$goods_id]['qty'] = $qty;
        return $_SESSION['cart'];
    }
}

function total_quantity(){
    $_SESSION['total_quantity'] = 0;
    foreach($_SESSION['cart'] as $key => $value){
        if(isset($value['price'])){
            // если получена цена товара из БД - суммируем кол-во
            $_SESSION['total_quantity'] += $value['qty'];
        }else{
            // иначе - удаляем такой ID из сессиии (корзины)
            unset($_SESSION['cart'][$key]);
        }
    }
}

function redirect(){
	$redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
	header("Location: $redirect");
	exit;
}

function logout(){
	unset($_SESSION['auth']);
}

function delete_from_cart($id){
    if($_SESSION['cart']){
        if(array_key_exists($id, $_SESSION['cart'])){
            $_SESSION['total_quantity'] -= $_SESSION['cart'][$id]['qty'];
            $_SESSION['total_sum'] -= $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price'];
            unset($_SESSION['cart'][$id]);
        }
    }
}

function clear($var){
    $var = mysql_real_escape_string(strip_tags(trim($var)));
    return $var;
}

function add_order(){
    $dostavka_id = (int)$_POST['dostavka'];
    if(!$dostavka_id) 
        $dostavka_id = 1;
    $prim = clear($_POST['prim']);
    if($_SESSION['auth']['user']) 
        $customer_id = $_SESSION['auth']['customer_id'];
    if(!$_SESSION['auth']['user']){
        $error = '';
        $name = clear($_POST['name']);
        $email = clear($_POST['email']);
        $phone = clear($_POST['phone']);
        $address = clear($_POST['address']);
        if(empty($name)) $error .= '<li>Не указано имя</li>';
        if(empty($email)) $error .= '<li>Не указан емайл</li>';
        if(empty($phone)) $error .= '<li>Не указан телефон</li>';
        if(empty($address)) $error .= '<li>Не указан адрес</li>';
        if(empty($error)){
            $customer_id = add_customer($name, $email, $phone, $address);
            if(!$customer_id) return false;
        }
        else{
            $_SESSION['order']['res'] = "Не заполнены обязательные поля: <ul>$error</ul>";
            $_SESSION['order']['name'] = $name;
            $_SESSION['order']['email'] = $email;
            $_SESSION['order']['phone'] = $phone;
            $_SESSION['order']['address'] = $address;
            $_SESSION['order']['prim'] = $prim;
            return false;
        }
    }
    save_order($customer_id, $dostavka_id, $prim);
}

function mail_order($order_id, $email){
    $subject = "Заказ в интернет-магазине";
    $headers .= "Content-type: text/plain; charset=utf-8\r\n";
    $headers .= "From: MYSHOP";
    $mail_body = "Благодарим Вас за заказ!\r\nНомер Вашего заказа - {$order_id}\r\n\r\n
    Заказанные товары:\r\n";
    foreach ($_SESSION['cart'] as $goods_id => $value) {
        $mail_body .= "Наименование: {$value['name']}, Цена: {$value['price']}, Количество: {$value['qty']} шт.\r\n";
    }
    $mail_body .= "\r\nИтого: {$_SESSION['total_quantity']} на сумму: {$_SESSION['total_sum']}";
    mail($email, $subject, $mail_body, $headers);
    mail(ADMIN_EMAIL, $subject, $mail_body, $headers);
} 

function pagination($page, $pages_count){
    //echo "Страница: {$page}; Общее кол-во страниц: {$pages_count}<br/><br/>";
    if($_SERVER['QUERY_STRING']){
        foreach ($_GET as $key => $value) {
            if($key != 'page') $uri .= "{$key}={$value}&amp;";
        }
    }
    $back = ''; //назад
    $forward = ''; // вперед
    $startpage = '';
    $endpage = '';
    $page2left = '';
    $page1left = '';
    $page2right = '';
    $page1right = '';
    if($page > 1){
        $back = "<li class='previous'><a href='?{$uri}page=".($page-1)."'>&laquo; Назад</a></li>";
    }
    else{
        $back = "<li class='previous-off'>&laquo; Назад</li>";        
    }
    if($page < $pages_count){
        $forward = "<li class='next'><a href='?{$uri}page=".($page+1)."'>Вперед &raquo;</a></li>";
    }
    else{
        $forward = "<li class='next-off'>Вперед &raquo;</li>"; 
    }
    if($page - 1 > 0){
        $page1left = "<li><a href='?{$uri}page=".($page-1)."'>".($page-1)."</a></li>";
    }
    if($page + 1 <= $pages_count){
        $page1right = "<li><a href='?{$uri}page=".($page+1)."'>".($page+1)."</a></li>";
    }
    if($page - 2 > 0){
        $page2left = "<li><a href='?{$uri}page=".($page-2)."'>".($page-2)."</a></li>";
    }
    if($page + 2 <= $pages_count){
        $page2right = "<li><a href='?{$uri}page=".($page+2)."'>".($page+2)."</a></li>";
    }
    if($page > 3){
        $startpage = "<li><a href='?{$uri}page=1'>1</a></li>";
    }
    if($page < ($pages_count-2)){
        $endpage = "<li><a href='?{$uri}page={$pages_count}'>$pages_count</a></li>";
    }
    if($page > 4){
        $dotleft = "<li class='next'><a href='?{$uri}page=".($page-3)."'>...</a></li>";
    }
    if($page < ($pages_count-3)){
        $dotright = "<li class='next'><a href='?{$uri}page=".($page+3)."'>...</a></li>";
    }
    echo "<ul id='pagination-flickr'>".$back.$startpage.$dotleft.$page2left.$page1left."<li class='active'>".$page."</li>".$page1right.$page2right.$dotright.$endpage.$forward."</ul>";
}