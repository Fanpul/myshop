<?php
defined('ISHOP') or die('Access denied');

function printarr($array) {
	echo "<pre>";
	print_r($array);
	echo "</pre>";
}

function adtocart($goods_id){
	if(isset($_SESSION['cart'][$goods_id])){
		$_SESSION['1'][$goods_id]['qty'] += 1;
		return $_SESSION['1'];
	}
	else{
		$_SESSION['1'][$goods_id]['qty'] = 1;
		return $_SESSION['1'];
	}
}

function redirect(){
	$redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
	header("Location: $redirect");
	exit;
}
?>