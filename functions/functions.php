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