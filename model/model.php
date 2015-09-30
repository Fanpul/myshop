<?php

defined('ISHOP') or die('Access denied');

function eyestopper($eye){
	$query = "SELECT goods_id, name, img, price FROM goods WHERE visible='1' AND $eye='1'";
	$res = mysql_query($query) or die(mysql_error());
	$eyestoppers = array();
	while($row = mysql_fetch_assoc($res)){
		$eyestoppers[] = $row;
	}
	return $eyestoppers;
}

function brands($par_id){
	$query = "SELECT brand_id, brand_name FROM brands WHERE parent_id='$par_id'";
	$res = mysql_query($query) or die(mysql_error());
	$brands = array();
	while($row = mysql_fetch_assoc($res)){
		$brands[] = $row;
	}
	return $brands;
}

function products($category, $start_pos, $perpage){
	$query = "SELECT goods_id, name, img, price, anons FROM goods 
		WHERE goods_brandid='$category' AND visible='1' LIMIT $start_pos, $perpage";
	$res = mysql_query($query) or die(mysql_error());
	//$_SESSION['count'][$category] = mysql_num_rows($res);
	$phones = array();
	while($row = mysql_fetch_assoc($res)){
		$phones[] = $row;
	}
	return $phones;
}

function current_brand($category)
{
	$query = "SELECT brand_name FROM brands 
		WHERE brand_id='$category'";
	$res = mysql_query($query) or die(mysql_error());
	$cur_br = array();
	while($row = mysql_fetch_assoc($res)){
		$cur_br[] = $row;
	}
	return $cur_br;
}

function total_sum($goods){
    $total_sum = 0;
    
    $str_goods = implode(',',array_keys($goods));
    
    $query = "SELECT goods_id, name, price, img
                FROM goods
                    WHERE goods_id IN ($str_goods)";
    $res = mysql_query($query) or die(mysql_error());
    
    while($row = mysql_fetch_assoc($res)){
        $_SESSION['cart'][$row['goods_id']]['name'] = $row['name'];
        $_SESSION['cart'][$row['goods_id']]['price'] = $row['price'];
        $_SESSION['cart'][$row['goods_id']]['img'] = $row['img'];
        $total_sum += $_SESSION['cart'][$row['goods_id']]['qty'] * $row['price'];
    }
    return $total_sum;
}

function total_items($cart)
	{
		$num_items = 0;

		if(is_array($cart))
		{
			foreach ($cart as $id => $qty)
			{
				$num_items += $qty;
			}
		}

		return $num_items;
	}

function total_summ($goods)
{
	$total_sum = 0.0;
	if(is_array($goods))
	{
		foreach ($goods as $id => $qty)
		{
			$query = "SELECT price, name FROM goods WHERE goods_id = '$id'";
			$result = mysql_query($query) or die(mysql_error());
			$item_sum = mysql_result($result,0,'price');
			$total_sum += $item_sum * $qty;
		}
	}
	return $total_sum;
}

function registration(){
	$error = '';
	$login = mysql_real_escape_string(trim($_POST['login']));
	$pass = trim($_POST['pass']);
	$name = mysql_real_escape_string(trim($_POST['name']));
	$email = mysql_real_escape_string(trim($_POST['email']));
	$phone = mysql_real_escape_string(trim($_POST['phone']));
	$address = mysql_real_escape_string(trim($_POST['address']));

	if(empty($login)) $error .= '<li>Не указан логин</li>';
	if(empty($pass)) $error .= '<li>Не указан пароль</li>';
	if(empty($name)) $error .= '<li>Не указано имя</li>';
	if(empty($email)) $error .= '<li>Не указан емайл</li>';
	if(empty($phone)) $error .= '<li>Не указан телефон</li>';
	if(empty($address)) $error .= '<li>Не указан адрес</li>';

	if(empty($error)){
		$query = "SELECT customer_id FROM customers WHERE login = '$login' LIMIT 1";
		$res = mysql_query($query) or die(mysql_error());
		$row = mysql_num_rows($res);
		if($row){
			$_SESSION['reg']['res'] = "Пользователь с таким логином уже есть";
			$_SESSION['reg']['name'] = $name;
			$_SESSION['reg']['email'] = $email;
			$_SESSION['reg']['phone'] = $phone;
			$_SESSION['reg']['address'] = $address;
		}
		else{
			$pass = md5($pass);
			$query = "INSERT INTO customers (name, email, phone, address, login, password)
			 VALUES ('$name', '$email', '$phone', '$address', '$login', '$pass')";
			$res = mysql_query($query) or die(mysql_error());
			if(mysql_affected_rows() > 0){
				$_SESSION['reg']['res'] = "Вы успешно зарегестрировались";
			 	$_SESSION['auth']['user'] = $name;
			 	$_SESSION['auth']['customer_id'] = mysql_insert_id();
			 	$_SESSION['auth']['email'] = $email;
			}
		}
	}
	else{
		$_SESSION['reg']['res'] = "Не заполнены обязательные поля: <ul>$error</ul>";
		$_SESSION['reg']['login'] = $login;
		$_SESSION['reg']['name'] = $name;
		$_SESSION['reg']['email'] = $email;
		$_SESSION['reg']['phone'] = $phone;
		$_SESSION['reg']['address'] = $address;
	}
}

function authorization(){
	$login = mysql_real_escape_string(trim($_POST['login']));
	$pass = trim($_POST['pass']);

	if(empty($login) or empty($pass)){
		$_SESSION['auth']['error'] = 'Заполните поля логин/пароль';
	} 
	else{
		$pass = md5($pass);
		$query = "SELECT customer_id, name, email FROM customers WHERE login='$login' AND password='$pass'";
		$res = mysql_query($query) or die(mysql_error());
		if(mysql_num_rows($res) == 1){
			$row = mysql_fetch_row($res);
			$_SESSION['auth']['customer_id'] = $row[0];
			$_SESSION['auth']['user'] = $row[1];
			$_SESSION['auth']['email'] = $row[2];
		}
		else{
			$_SESSION['auth']['error'] = "Не верные логин/пароль";	
		}
	}
}

function get_dostavka(){
	$query = "SELECT * FROM dostavka";
	$res = mysql_query($query) or die(mysql_error());
	$dostavka = array();
	while($row = mysql_fetch_assoc($res)){
		$dostavka[] = $row;
	}
	return $dostavka;
}

function add_customer($name, $email, $phone, $address){
	$query = "INSERT INTO customers (name, email, phone, address) VALUES ('$name', '$email', '$phone', '$address')";
	$res = mysql_query($query);
	if(mysql_affected_rows() > 0){
		return mysql_insert_id();
	}
	else{
        $_SESSION['order']['res'] = "Ошибка при регистрации заказа: <ul>$error</ul>";
        $_SESSION['order']['name'] = $name;
        $_SESSION['order']['email'] = $email;
        $_SESSION['order']['phone'] = $phone;
        $_SESSION['order']['address'] = $address;
        $_SESSION['order']['prim'] = $prim;
        return false;		
	}
}

function save_order($customer_id, $dostavka_id, $prim){
	//$current_day = date("d.m.Y");
	$query = "INSERT INTO orders(customer_id, date, dostavka_id, prim)
				VALUES ('$customer_id', NOW(), '$dostavka_id', '$prim')";
	$res = mysql_query($query) or die(mysql_error());
	if(mysql_affected_rows() == -1){
		mysql_query("DELETE FROM customers WHERE customer_id = $customer_id AND login = ''");
		return false;
	}
	$order_id = mysql_insert_id();
	foreach ($_SESSION['cart'] as $goods_id => $value) {
		$val .= "($order_id, $goods_id, {$value['qty']}),"; 
	}
	$val = substr($val, 0, -1);
	$query = "INSERT INTO zakaz_tovar(orders_id, goods_id, quantity) VALUES $val";
	mysql_query($query) or die(mysql_error());
	if(mysql_affected_rows() ==-1){
		mysql_query("DELETE FROM orders WHERE order_id = $order_id");
		mysql_query("DELETE FROM customers WHERE customer_id = $customer_id AND login = '' ");
		return false;
	}
	if($_SESSION['auth']['email'])
		$email = $_SESSION['auth']['email'];
	else $email = $_SESSION['order']['email'];
	mail_order($order_id, $email);
	unset($_SESSION['cart']);
	unset($_SESSION['total_sum']);
	unset($_SESSION['total_quantity']);
	$_SESSION['order']['res'] = "Спасибо за ваш заказ. Мы с вами свяжемся в ближайшее время";
	return true;
}

function search(){
	$search = clear($_GET['search']);
	$result_search = array();
	if(mb_strlen($search, 'UTF-8') < 4){
		$result_search['notfound'] = "Не менее 4 символов";
	}
	else{
		$query = "SELECT goods_id, name, img, price, hits, new, sale, anons
		 FROM goods
		 WHERE MATCH(name) AGAINST('{$search}*' IN BOOLEAN MODE) AND visible='1'";
		$res = mysql_query($query) or die(mysql_error());
		$ser = array();
		while($row = mysql_fetch_assoc($res)){
			$ser[] = $row;
		}
		return $ser;		
	}
}

function count_rows($category){
	$query = "SELECT goods_id, name, img, price, anons FROM goods 
		WHERE goods_brandid='$category' AND visible='1'";
	$res = mysql_query($query) or die(mysql_error());
	$count_rows = mysql_num_rows($res);
	$_SESSION['nun'][$category] = $count_rows;
	return $count_rows;
}