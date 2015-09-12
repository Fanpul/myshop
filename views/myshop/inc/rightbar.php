<?php defined('ISHOP') or die('Access denied'); ?>
<div class="right_content">

    <div class="shopping_cart">
        <div class="cart_title">Корзина</div>

        <?php if($_SESSION['total_quantity']):?>
        <div class="cart_details">
            Товаров в корзине: <span class="price"><?=$_SESSION['total_quantity']?></span><br />
            <span class="border_cart"></span>
            Сумма: <span class="price"><?=$_SESSION['total_sum']?> грн</span>
        </div>
        <div class="cart_icon"><a href="#" title="header=[Оформить заказ] body=[&nbsp;] fade=[on]"><img src="<?=TEMPLATE?>images/shoppingcart.png" alt="" title="" width="48" height="48" border="0" /></a></div>
        <?php else:?>
        <div class="cart_details">
            Корзина пуста
        </div>    
        <div class="cart_icon"><img src="<?=TEMPLATE?>images/shoppingcart.png" alt="" title="" width="48" height="48" border="0" /></div>
        <?php endif;?>
        
    </div>

    <div class="title_box">Авторизация</div>  
    <div class="border_box">
        <div class="box_btn_reg">
            <a class="btn-reg" href="#">Вход/Регистрация</a>
        </div>
    </div>  

    <div class="title_box">Выбор по параметрам</div>  
    <div class="border_box">
        <div class="box_btn_reg">
            <form method="post" action="">
            <p>Стоимость:</p>
            от <input class="podbor-price" type="text" name="start-price" />
            до <input class="podbor-price" type="text" name="end-price" />
             грн.
             <br /><br />
            <p>Производители:</p>
            <select>
                <option>Ericsson</option>
                <option>Alcatel</option>
                <option>Mitsubish</option>
                <option>Motorola</option>
                <option>NEC</option>
                <option>Nokia</option>                          
            </select>
            <button type="submit" class="btn-reg podbor">Найти</button>
                                 
            </form>
        </div>     
    </div>        
</div><!-- end of right content -->   