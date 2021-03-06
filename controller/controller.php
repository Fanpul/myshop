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
}
$view = empty($_GET['view']) ? 'hits' : $_GET['view'];

if($_POST['reg']){
	registration();
	redirect();
}
if($_POST['auth']){
	authorization();
	redirect();
}
if($_GET['do'] == 'logout'){
	logout();
	redirect();
}

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
		$current_brand = current_brand($category);
		$perpage = 1;
		//$page = 1;
		if(isset($_GET['page'])){
			$page = (int)$_GET['page'];
			if($page < 1){
				$page = 1;
			}
		} 
		else{
			$page = 1;
		}
		$count_rows = count_rows($category);
		$pages_count = ceil($count_rows / $perpage);
		if(!$pages_count) $pages_count = 1;
		if($page > $pages_count) $page = $pages_count;
		$start_pos = ($page - 1) * $perpage;
		$products = products($category, $start_pos, $perpage);
		break;	
	case 'addtocart':
		$goods_id = abs((int)$_GET['goods_id']);
		adtocart($goods_id);
		//$_SESSION['total_quantity'] = total_items($_SESSION['cart']);
		$_SESSION['total_sum'] = total_sum($_SESSION['cart']);
		total_quantity();
		redirect();
		break;	
	case 'reg':
		//
		break;	
	case 'cart':
		$dostavka = get_dostavka();
		if(isset($_GET['id'], $_GET['qty'])){
			$goods_id = abs((int)$_GET['id']);
			$qty = abs((int)$_GET['qty']);
			$qty = $qty - $_SESSION['cart'][$goods_id]['qty'];
			adtocart($goods_id, $qty);
			$_SESSION['total_sum'] = total_sum($_SESSION['cart']);
			total_quantity();
			redirect();
		}
		if(isset($_GET['delete'])){
			$id = abs((int)$_GET['delete']);
			if($id){
				delete_from_cart($id);
			}
			redirect();
		}
		if(isset($_POST['buy'])){
			add_order();
			redirect();
			$info = "Мы с вами свяжемся!";
		}
		break;
	case 'search':
		if($_GET['ser_x'])
		//if(isset($_GET['ser']))
		$result_search = search();
		break;		
	default:
		$view = 'hits';
		$eyestoppers = eyestopper('hits');
		break;
}
$brand_list = brands('0');
require_once TEMPLATE.'index.php';