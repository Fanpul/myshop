<?php defined('ISHOP') or die('Access denied'); ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title><?=TITLE?></title>
<link rel="stylesheet" type="text/css" href="<?=TEMPLATE?>style.css" />
<!--[if lt IE 9]>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
<![endif]-->
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="<?=TEMPLATE?>iecss.css" />
<![endif]-->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<script type="text/javascript" src="<?=TEMPLATE?>js/boxOver.js"></script>
<script type="text/javascript" src="<?=TEMPLATE?>js/functions.js"></script>
</head>
<body>
<div id="main_container">

  <header>
    <div class="top_bar">
      <div class="top_search">
        <div class="search_text"><a href="#">Поиск:</a></div>
        <input type="text" class="search_input" name="search" />
        <input type="image" src="<?=TEMPLATE?>images/search.gif" class="search_bt"/>
      </div>

      <div class="languages">
        <div class="lang_text">
          <a class="lang" href="#">Вход</a> / 
          <a class="lang"href="#">Регистрация</a>
        </div>      
      </div>
    </div>

    <div id="header">
      <div id="logo">
        <a href="<?=PATH?>"><img src="<?=TEMPLATE?>images/logo.png" alt="" title="" border="0" width="237" height="140" /></a>
      </div>

      <div class="oferte_content">
        <div class="top_divider"><img src="<?=TEMPLATE?>images/header_divider.png" alt="" title="" width="1" height="164" /></div>
        <div class="oferta">

          <div class="oferta_content">
            <img src="<?=TEMPLATE?>images/iphone.png" border="0" class="oferta_img" />

            <div class="oferta_details">
              <div class="oferta_title">iPhone 5s</div>
              <div class="oferta_text">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
              </div>
              <a href="#" class="details">Далее</a>
            </div>
          </div>
          <div class="oferta_pagination">

            <a href="#?" class="current">1</a>
            <a href="#?page=2">2</a>
            <a href="#?page=3">3</a>
            <a href="#?page=4">4</a>
            <a href="#?page=5">5</a>  

          </div>        

        </div>
        <div class="top_divider"><img src="<?=TEMPLATE?>images/header_divider.png" alt="" title="" width="1" height="164" /></div>

      </div> <!-- end of oferte_content-->

            <!--ГЛАВНОЕ МЕНЮ-->
    </div>
    <div id="menu_tab">
      <div class="left_menu_corner"></div>
      <ul class="menu">
        <li><a href="#" class="nav1">Главная</a></li>
        <li class="divider"></li>
        <li><a href="#" class="nav2">О магазине</a></li>
        <li class="divider"></li>
        <li><a href="#" class="nav5">Оплата и доставка</a></li>
        <li class="divider"></li>
        <li><a href="#" class="nav3">Покупка в кредит</a></li>
        <li class="divider"></li>
        <li><a href="#" class="nav6">Контакты</a></li>
        <li class="divider"></li>
        <li><a href="#" class="nav4">Вход/Авторизация</a></li>                        
      </ul>
     <div class="right_menu_corner"></div>
   </div>
  </header>