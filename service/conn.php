<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "blogsiteproje";



try {
	$db = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
}catch(PDOException $e) {
	echo $e->getMessage();
}

$db -> exec("SET CHARACTER SET utf8");



?>