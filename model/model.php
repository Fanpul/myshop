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

function products($category){
	$query = "SELECT name, brand_name, img, price FROM goods 
		LEFT JOIN brands ON goods.goods_brandid=brands.brand_id 
		WHERE goods.goods_brandid='$category'  AND visible='1'";
	$res = mysql_query($query) or die(mysql_error());
	$phones = array();
	while($row = mysql_fetch_assoc($res)){
		$phones[] = $row;
	}
	return $phones;
}

function current_b($category)
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