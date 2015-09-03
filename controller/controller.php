<?php

defined('ISHOP') or die('Access denied');
require_once MODEL;

$view = empty($_GET['view']) ? 'hits' : $_GET['view'];

require_once TEMPLATE.'index.php';
