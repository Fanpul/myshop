<?
    $id = $_GET['id'];
    $product = get_product($id);
?>


<div class="prod_box">
	<div class="top_prod_box"></div>
    <div class="center_prod_box">            
         <div class="product_title"><a href="details.html"><? echo $product ['title']; ?></a></div>
         <div class="product_img"><a href="details.html"><img src="userfiles/<? echo $product ['image']; ?>" alt="" title="" border="0" /></a></div>
         <div class="prod_price"><span class="reduce"><? echo $product ['old_price']; ?></span> <span class="price"><? echo $product['price']; ?></span></div>                        
    </div>
    <div class="bottom_prod_box"></div>             
    <div class="prod_details_tab">
    <a href="#" title="header=[Add to cart] body=[&nbsp;] fade=[on]"><img src="images/cart.gif" alt="" title="" border="0" class="left_bt" /></a>
    <a href="#" title="header=[Specials] body=[&nbsp;] fade=[on]"><img src="images/favs.gif" alt="" title="" border="0" class="left_bt" /></a>
    <a href="#" title="header=[Gifts] body=[&nbsp;] fade=[on]"><img src="images/favorites.gif" alt="" title="" border="0" class="left_bt" /></a>           
    <a href="details.html" class="prod_details">details</a>            
    </div>                     
</div>