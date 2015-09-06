<?php

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
		$current_b = current_b($category);
		break;	
	default:
		$view = 'hits';
		$eyestoppers = eyestopper('hits');
		break;
}
$brand_list = brands('0');
require_once TEMPLATE.'index.php';