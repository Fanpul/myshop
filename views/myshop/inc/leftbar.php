<?php defined('ISHOP') or die('Access denied'); ?>
<div class="left_content">
    <div class="title_box">Каталог</div>

    <ul class="left_menu">
        <li class="odd"><a href="?view=new">Новинки</a></li>
        <li class="even"><a href="?view=hits">Лидеры продаж</a></li>
        <li class="odd"><a href="?view=sale">Распродажа</a></li>
    </ul> 
    <div class="title_box">Мобильные телефоны</div>

    <ul class="left_menu">

    <?php if($brand_list):
    foreach ($brand_list as $value):
    ?>    
        <li class="even"><a href="?view=cat&category=<?=$value['brand_id']?>"><?=$value['brand_name']?></a></li>
    <?php endforeach;?>               
    <?php endif;?> 

    </ul> 

    <div class="title_box">Контакты</div>
    <div class="border_box">
        <p>
            Телефон:<br/>
            8 (800) 700-00-01<br/>
            Режим работы:<br/>
            Будние дни: <br/>
            с 9:00 до 18:00<br/>
            Суббота, Воскресенье:<br/>
            выходные
        </p>
    </div>  

</div><!-- end of left content -->