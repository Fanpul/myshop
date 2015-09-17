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

function redirect(){
	$redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
	header("Location: $redirect");
	exit;
}

function logout(){
	unset($_SESSION['auth']);
}
