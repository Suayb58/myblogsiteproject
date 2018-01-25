<?php
include "conn.php";
include "httpFonksiyonlari.php";
$islem = isset($_GET["islem"]) ? addslashes(trim($_GET["islem"])) : null;
$jsonArray = array(); 
$jsonArray["hata"] = FALSE; 

$_code = 200; 

	
 

 if($_SERVER['REQUEST_METHOD'] == "DELETE") {

   
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
		$id = intval($_GET["id"]);
		$kelimeVarMi = $db->query("select * from sayfalar where id='$id'")->rowCount();
		if($kelimeVarMi) {
			
			$sil = $db->query("delete from sayfalar where id='$id'");
			if( $sil ) {
				$_code = 200;
				$jsonArray["mesaj"] = "Sayfa Silindi.";
			}else {
				 
				$_code = 400;
				$jsonArray["hata"] = TRUE;
	 			$jsonArray["hataMesaj"] = "Sistemsel Bir Hata Oluştu";
			}
		}else {
			$_code = 400; 
			$jsonArray["hata"] = TRUE; 
    		$jsonArray["hataMesaj"] = "Geçersiz id"; 
		}
	}else {
		$_code = 400;
		$jsonArray["hata"] = TRUE; 
    	$jsonArray["hataMesaj"] = "Lütfen id değişkeni gönderin"; 
	}
} 
else {
	$_code = 406;
	$jsonArray["hata"] = TRUE;
 	$jsonArray["hataMesaj"] = "Geçersiz method!";
}


SetHeader($_code);
$jsonArray[$_code] = HttpStatus($_code);
echo json_encode($jsonArray);
?>