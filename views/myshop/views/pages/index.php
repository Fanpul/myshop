    <div class="center_title_bar">Latest Products</div>
<?
    foreach ($products as $item):
?>

    	<div class="prod_box">
        	<div class="top_prod_box"></div>
            <div class="center_prod_box">            
                 <div class="product_title"><a href="index.php?view=details&id=<? echo $item['id'];?>"><? echo $item['title']; ?></a></div>
                 <div class="product_img"><a href="index.php?view=details&id=<? echo $item['id'];?>"><img src="userfiles/<? echo $item['image']; ?>" alt="" title="" border="0" /></a></div>
                 <div class="prod_price"><span class="reduce"><? echo $item['old_price']; ?></span> <span class="price"><? echo $item['price']; ?></span></div>                        
            </div>
            <div class="bottom_prod_box"></div>             
            <div class="prod_details_tab">
            <a href="#" title="header=[Add to cart] body=[&nbsp;] fade=[on]"><img src="images/cart.gif" alt="" title="" border="0" class="left_bt" /></a>
            <a href="#" title="header=[Specials] body=[&nbsp;] fade=[on]"><img src="images/favs.gif" alt="" title="" border="0" class="left_bt" /></a>
            <a href="#" title="header=[Gifts] body=[&nbsp;] fade=[on]"><img src="images/favorites.gif" alt="" title="" border="0" class="left_bt" /></a>           
            <a href="index.php?view=details&id=<? echo $item['id'];?>" class="prod_details">details</a>            
            </div>                     
        </div>
<?endforeach;?>