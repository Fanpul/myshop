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

function phones_by_brand($id){
	$query = "SELECT * FROM goods WHERE goods_brandid='$id'";
	$res = mysql_query($query) or die(mysql_error());
	$phones = array();
	while($row = mysql_fetch_assoc($res)){
		$phones[] = $row;
	}
	return $phones;
}