<?php defined('ISHOP') or die('Access denied');?>

	<div class="center_title_bar">Ваша корзина товаров</div>
	<div class="prod_box_big">
    	<div class="top_prod_box_big"></div>
        <div class="center_prod_box_big">  
<?

	if($_SESSION['cart']):

?>
			<form action="" method="post" id="cart-form">
				<table id="mycart" align="center" cellspacing="0" cellpadding="0" border="0">
					  <tr>
						  	<th></th>
						  	<th>Товар</th>
							<th>Цена</th>
							<th>Кол-во</th>
							<th>Всего</th>
							<th></th>
					  </tr>
<?
	foreach ($_SESSION['cart'] as $key => $item):
?>
					  <tr>
				          <td align="center"><img src="<?=PRODUCTIMG?><?=$item['img']?>" alt=""></td>
				          <td align="center"><?=$item['name']?></td>
				    	  <td align="center"><?=$item['price']?> грн.</td>
				    	  <td align="center"><input type="number" min="1" max="10" id="id<?=$key?>" class="kolvo" size="2" name="" maxlength="2" value="<?=$item['qty']?>" /></td>
				    	  <td align="center"><?=$item['qty']*$item['price']?> грн.</td>
				    	  <td align="center"><a href="?view=cart&delete=<?=$key?>"><img src="<?=TEMPLATE?>images/delete.png" alt="удалить"></a></td>
					  </tr>
<? endforeach; ?>
				</table>	
				 <p class="total" align="center">Общая сумма заказа: <span class="product-price"><?=$_SESSION['total_sum'];?>грн</span></p>
				 <p align="center"><input type="submit" name="update" value="Оформить" /></p>			
			</form>                 
<?else:?>
	<img src="<?=TEMPLATE?>images/shoppingcart.png" alt="">
	Ваша корзина пуста!
<?php endif;?>
        </div>
    	<div class="bottom_prod_box_big"></div>
    </div>