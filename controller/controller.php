<?php

defined('ISHOP') or die('Access denied');
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
	case 'products':
		$eyestoppers = phones_by_brand($_GET['brand_id']);
		break;	
	default:
		$view = 'hits';
		$eyestoppers = eyestopper('hits');
		break;
}
$brand_list = brands('0');
require_once TEMPLATE.'index.php';