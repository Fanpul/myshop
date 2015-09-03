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
	default:
		$view = 'hits';
		$eyestoppers = eyestopper('hits');
		break;
}

require_once TEMPLATE.'index.php';