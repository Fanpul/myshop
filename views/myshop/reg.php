<?php defined('ISHOP') or die('Access denied');?>
<div class="center_title_bar">Регистрация</div>
<? //printarr($_SESSION);?>
<div class="prod_box_big">
	<div class="top_prod_box_big"></div>
	<div class="center_prod_box_big">            
		<form method="post" action="#">
			<div class="form-align">
				<label for="">Логин*</label>
				<input type="text" name="login" value="<?=$_SESSION['reg']['login']?>">	
			</div>
			<div class="form-align">
				<label for="">Пароль*</label>
				<input type="password" name="pass">	
			</div>
			<div class="form-align">
				<label for="">ФИО*</label>
				<input type="text" name="name" value="<?=$_SESSION['reg']['name']?>">	
			</div>
			<div class="form-align">
				<label for="">E-mail*</label>
				<input type="email" name="email" value="<?=$_SESSION['reg']['email']?>">	
			</div>
			<div class="form-align">
				<label for="">Телефон*</label>
				<input type="text" name="phone" value="<?=$_SESSION['reg']['phone']?>">	
			</div>
			<div class="form-align">
				<label for="">Адрес доставки*</label>
				<input type="text" name="address" value="<?=$_SESSION['reg']['address']?>">	
			</div>	
			<div class="form-align">
				<input class="btn-reg" type="submit" name="reg" value="Зарегестрироваться">	
			</div>		
		</form>     
		<?php
			if(isset($_SESSION['reg']['res'])){
				echo '<div class="error">'.$_SESSION['reg']['res'].'</div>';
				unset($_SESSION['reg']);
			}
		?>                   
	</div>
	<div class="bottom_prod_box_big"></div>             
</div>



