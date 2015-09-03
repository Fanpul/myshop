
	<div class="center_title_bar">Ваша корзина товаров</div>
	<div class="prod_box_big">
    	<div class="top_prod_box_big"></div>
        <div class="center_prod_box_big">  
<?

	if($_SESSION['cart'] != '0'){

?>
			<form action="index.php?view=update_cart" method="post" id="cart-form">
				<table id="mycart" align="center" cellspacing="0" cellpadding="0" border="0">
					  <tr>
						  <th>Товар</th>
							<th>Цена</th>
							<th>Кол-во</th>
							<th>Всего</th>
					  </tr>
<?
	foreach ($_SESSION['cart'] as $id => $qty):
	$product = get_product($id);
?>
					  <tr>
				          <td align="center"><? echo $product['title']; ?></td>
				    	  <td align="center"><? echo number_format($product['price'],2); ?>$</td>
				    	  <td align="center"><input type="text" size="2" name="<? echo $id; ?>" maxlength="2" value="<? echo $qty; ?>" /></td>
				    	  <td align="center"><? echo  number_format($product['price']*$qty,2); ?>$</td>
					  </tr>
					<? endforeach; ?>
				</table>	
				 <p class="total" align="center">Общая сумма заказа: <span class="product-price"><? echo $_SESSION['total_price'] = total_price($_SESSION['cart']);?>$</span></p>
				 <p align="center"><input type="submit" name="update" value="Обновить" /></p>			
			</form>                 
        </div>
    	<div class="bottom_prod_box_big"></div>  
	</div>
<?
}
?>