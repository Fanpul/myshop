<?php defined('ISHOP') or die('Access denied');?>

<div class="center_title_bar">Телефоны по брендам: <?=$current_brand[0]['brand_name']?>
<span class="list-or-grid">
	<a href="#" id="grid" class="grid_list"><i class="fa fa-th"></i></a>
	<a href="#" id="list" class="grid_list"><i class="fa fa-align-justify"></i></a>
</span>
</div>

<?php if(!isset($_COOKIE['display']) OR $_COOKIE['display'] == 'grid'):
	if($products):
	foreach ($products as $value):?>

<div class="prod_box">
	<div class="top_prod_box"></div>
	<div class="center_prod_box">            
		<div class="product_title"><a href="?view=product&goods_id=<?=$value['goods_id']?>"><?=$value['name']?></a></div>
		<div class="product_img"><img src="<?=TEMPLATE?>images/phone-index.jpg" alt="" title="" border="0" /></div>
		<div class="prod_price"><span class="reduce">29 990</span> <span class="price"><?=$value['price']?></span>грн.</div>                        
	</div>
	<div class="bottom_prod_box"></div>             
	<div class="prod_details_tab">
		<a href="#" class="btn-add-cart" title="header=[В корзину] body=[&nbsp;] fade=[on]"><img src="<?=TEMPLATE?>images/cart.gif" alt="" title="" border="0" class="left_bt" />Добавить в корзину</a>
	</div> 
</div>
<?php endforeach;?>
	<?php else:?>
		<p>Товаров пока нет!</p>                 
<?php endif;?>  
<?php else:?>
	<?php if($products):
	foreach ($products as $value):?>
	<div class="prod_box_big">
    	<div class="top_prod_box_big"></div>
        <div class="center_prod_box_big">            
             <div class="product_img_big">
             <a href="javascript:popImage('','Some Title')" title="header=[<? echo $product['title'];?>] body=[&nbsp;] fade=[on]"><img src="<?=TEMPLATE?>images/phone-index.jpg" alt="" title="" border="0" /></a>
             
             </div>
                 <div class="details_big_box">
                     <div class="product_title product_title_big"><a href="?view=product&goods_id=<?=$value['goods_id']?>"><?=$value['name']?></a></div>
                     <div class="specifications">
                        <?=$value['anons'];?>
                     </div>
                     <div class="prod_price_big"><span class="reduce">2000</span>  <span class="price"><?=$value['price']?></span> грн.</div>
                     
                    <a href="#" class="btn-add-cart" title="header=[В корзину] body=[&nbsp;] fade=[on]"><img src="<?=TEMPLATE?>images/cart.gif" alt="" title="" border="0" class="left_bt" />Добавить в корзину</a>
                
                 </div>                        
        </div>
        <div class="bottom_prod_box_big"></div>                                
    </div>
<?php endforeach;?>
	<?php else:?>
		<p>Товаров пока нет!</p>                 
<?php endif;?> 
<?php endif;?> 

