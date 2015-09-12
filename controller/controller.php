<?php
session_start();
defined('ISHOP') or die('Access denied');
require_once FUNCTIN;
require_once MODEL;
if(!isset($_SESSION['cart']))
{
	$_SESSION['cart'] = array();
	$_SESSION['total_sum'] = 0.0;
	$_SESSION['total_quantity'] = 0;
	//$_SESSION['total_price'] = '0.00';
}
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
		//$_SESSION['cart']['qty'] = 1;

		$add_item = addtocart($goods_id);
		$_SESSION['total_quantity'] = total_items($_SESSION['cart']);
		$_SESSION['total_sum'] = total_summ($_SESSION['cart']);
		redirect();
		break;	
	default:
		$view = 'hits';
		$eyestoppers = eyestopper('hits');
		break;
}
$brand_list = brands('0');
require_once TEMPLATE.'index.php';