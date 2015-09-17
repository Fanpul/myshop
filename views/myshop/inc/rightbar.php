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
        <div class="cart_icon"><a href="?view=cart" title="header=[Оформить заказ] body=[&nbsp;] fade=[on]"><img src="<?=TEMPLATE?>images/shoppingcart.png" alt="" title="" width="48" height="48" border="0" /></a></div>
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
            <?php if(!$_SESSION['auth']['user']):?>
                <form class="form-auth" method="post" action="#">
                    <input type="text" name="login" placeholder="Логин" />
                    <input type="password" name="pass" placeholder="Пароль" />
                    <a href="?view=reg">Регистрация</a>
                    <input class="btn-reg" type="submit" name="auth" value="Войти">
                </form>
            <?php
                if(isset($_SESSION['auth']['error'])){
                    echo $_SESSION['auth']['error'];
                    unset($_SESSION['auth']);
                }
            ?>
            <?php else:?>
                <p>Добро пожаловать, <?=$_SESSION['auth']['user']?></p>
                <a href="?do=logout">Выход</a>
            <?php endif;?>      
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