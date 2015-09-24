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