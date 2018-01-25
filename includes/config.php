<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$db_adres = "localhost";
$db_user = "root";
$db_pass = "";
$db_table = "blogsiteproje";

$conn=mysql_connect($db_adres,$db_user,$db_pass);

if(!$conn){
	die("Bağlantı hatası".mysql_error());
}

mysql_select_db($db_table,$conn);

mysql_query("SET NAMES utf8");


session_start();
?>