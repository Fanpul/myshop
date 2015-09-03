<?php defined('ISHOP') or die('Access denied'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?=TEMPLATE?>css/style.css" />
<!--[if lt IE 9]>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
<![endif]-->
<script type="text/javascript" src="<?=TEMPLATE?>js/functions.js"></script>
<title>Интернет магазин сотовых телефонов</title>
</head>

<body>
<div class="main">
	<div class="header">
		<a href="/"><img class="logo" src="<?=TEMPLATE?>images/logo.jpg" alt="Интернет магазин сотовых телефонов" /></a>
		<img class="slogan" src="<?=TEMPLATE?>images/slogan.jpg" alt="Интернет-магазин Сотовых телефонов" />
		<div class="head-contact">
		<p><strong>Телефон:</strong><br />
		<span>8 (800) 700-00-01</span></p>
		<p><strong>Режим работы:</strong><br />
		Будние дни: с 9:00 до 18:00<br />  
		Суббота, Воскресенье - выходные</p>  
		</div>
		<form method="get" action="">
		<ul class="search-head">
			<li><input type="text" name="search" id="quickquery" placeholder="Что вы хотите купить?" /></li>
				<script type="text/javascript">
					 //<![CDATA[
					  placeholderSetup('quickquery');
					  //]]>
				</script>
			<li><input class="search-btn" type="image" src="<?=TEMPLATE?>images/searc-btn.jpg" /></li>
		</ul>
		</form>	
	</div>
	<ul class="menu">
		<li><a href="#">Главная</a></li>
		<li><a href="#">О магазине</a></li>
		<li><a href="#">Оплата и доставка</a></li>
		<li><a href="#">Покупка в кредит</a></li>
		<li><a href="#">Контакты</a></li>
	</ul>