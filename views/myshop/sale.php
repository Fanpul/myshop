<?php defined('ISHOP') or die('Access denied'); ?>
<div class="center_title_bar">Распродажа</div>

<?php if($eyestoppers):
foreach ($eyestoppers as $value):
?>
<div class="prod_box">
	<div class="top_prod_box"></div>
	<div class="center_prod_box">            
		<div class="product_title"><a href="?view=product&goods_id=<?=$value['goods_id']?>"><?=$value['name']?></a></div>
		<div class="product_img"><img src="<?=TEMPLATE?>images/phone-index.jpg" alt="" title="" border="0" /></div>
		<div class="prod_price"><span class="reduce">29 990</span> <span class="price"><?=$value['price']?></span>грн.</div>                        
	</div>
	<div class="bottom_prod_box"></div>             
	<div class="prod_details_tab">
		<a href="?view=addtocart&goods_id=<?=$value['goods_id']?>" class="btn-add-cart" title="header=[В корзину] body=[&nbsp;] fade=[on]"><img src="<?=TEMPLATE?>images/cart.gif" alt="" title="" border="0" class="left_bt" />Добавить в корзину</a>
	</div> 
</div>
<?php endforeach;?>
	<?php else:?>
		<p>Товаров пока нет!</p>                 
<?php endif;?>  