<?php
defined('ISHOP') or die('Access denied');
define('PATH', 'http://myshop.local/');
define('MODEL', 'model/model.php');
define('FUNCTIN', 'functions/functions.php');
define('CONTROLLER', 'controller/controller.php');
define('VIEW', 'views/');
define('PRODUCTIMG', PATH.'userfiles/');
define('ADMIN_EMAIL','admin@shop.ru');

define('TEMPLATE', VIEW.'myshop/');
define('TITLE', 'Интернет магазин мобильных телефонов');

// БД
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'myshop');

mysql_connect(HOST, USER, PASS) or die('No connect to Server');
mysql_select_db(DB) or die('No connect to DB');
mysql_query("SET NAMES 'UTF8'") or die('Cant set charset');