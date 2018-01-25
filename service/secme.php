<?php
include "conn.php";
include "httpFonksiyonlari.php";
$islem = isset($_GET["islem"]) ? addslashes(trim($_GET["islem"])) : null;
$jsonArray = array(); 
$jsonArray["hata"] = FALSE; 

$_code = 200; 

	
 if($_SERVER['REQUEST_METHOD'] == "GET") {


    // üye bilgisi listeleme burada olacak. GET işlemi 
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
		$id = intval($_GET["id"]);
		$userVarMi = $db->query("select * from sayfalar where id='$id'")->rowCount();
		if($userVarMi) {
			
			$bilgiler = $db->query("select * from  sayfalar where id='$id'")->fetch(PDO::FETCH_ASSOC);
			$jsonArray["sayfa-bilgileri"] = $bilgiler;
			$_code = 200;
			
		}else {
			$_code = 400;
			$jsonArray["hata"] = TRUE; 
    		$jsonArray["hataMesaj"] = "Sayfa bulunamadı"; 
		}
	}else {
		$_code = 400;
		$jsonArray["hata"] = TRUE; 
    	$jsonArray["hataMesaj"] = "Lütfen id değişkeni gönderin"; 
	}
}else {
	$_code = 406;
	$jsonArray["hata"] = TRUE;
 	$jsonArray["hataMesaj"] = "Geçersiz method!";
}


SetHeader($_code);
$jsonArray[$_code] = HttpStatus($_code);
echo json_encode($jsonArray);
?>