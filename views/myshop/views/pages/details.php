<div class="center_title_bar"><? echo $product['title'];?></div>   
	<div class="prod_box_big">
    	<div class="top_prod_box_big"></div>
        <div class="center_prod_box_big">            
             
             <div class="product_img_big">
             <a href="javascript:popImage('images/big_pic.jpg','Some Title')" title="header=[<? echo $product['title'];?>] body=[&nbsp;] fade=[on]"><img src="userfiles/<? echo $product['image'];?>" alt="" title="" border="0" /></a>
             </div>
                 <div class="details_big_box">
                     <div class="product_title_big"><? echo $product['title'];?></div>
                     <div class="specifications">
                        <? echo $product['description'];?>
                     </div>
                     <div class="prod_price_big"><span class="reduce"><? echo $product['old_price'];?></span> <span class="price"><? echo $product['price'];?></span></div>
                     
                     <a href="index.php?view=add_to_cart&id=<? echo $product['id'];?>" class="addtocart">В корзину</a>
                     <a href="index.php" class="compare">Назад</a>
                 </div>                        
        </div>
        <div class="bottom_prod_box_big"></div>                                
    </div>
    
 

 
 