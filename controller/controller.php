<?php
session_start();
defined('ISHOP') or die('Access denied');
require_once FUNCTIN;
require_once MODEL;

$view = empty($_GET['view']) ? 'hits' : $_GET['view'];

switch ($view) {
	case 'hits':
		$eyestoppers = eyestopper('hits');
		break;
	case 'new':
		$eyestoppers = eyestopper('new');
		break;
	case 'sale':
		$eyestoppers = eyestopper('sale');
		break;	
	case 'cat':
		$category = abs((int)$_GET['category']);
		$products = products($category);
		$current_brand = current_brand($category);
		break;	
	case 'addtocart':
		$goods_id = abs((int)$_GET['goods_id']);
		$_SESSION['cart']['qty'] = 1;
		$_SESSION['total_quantity'] = 0;
		foreach($_SESSION['cart'] as $key => $value){
			if(isset($value['price'])){
				$_SESSION['total_quantity'] += $value['qty'];
			}
			else{
				unset($_SESSION['cart'][$key]);
			}
		}
		$_SESSION['total_sum'] = total_sum($_SESSION['cart']);
		redirect();
		break;	
	default:
		$view = 'hits';
		$eyestoppers = eyestopper('hits');
		break;
}
$brand_list = brands('0');
require_once TEMPLATE.'index.php';