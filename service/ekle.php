<?php
include "conn.php";
include "httpFonksiyonlari.php";
$islem = isset($_GET["secim"]) ? addslashes(trim($_GET["secim"])) : null;
$jsonArray = array(); 
$jsonArray["hata"] = FALSE; 

$_code = 200; 

	
 if($_SERVER['REQUEST_METHOD'] == "POST") {
 	
 	 
    $isim = addslashes($_POST["isim"]);
    $konu_kisalt = addslashes($_POST["konu_kısalt"]);
    $konu_bolumu=addslashes($_POST["konu_bölümü"]);
	$icerik=addslashes($_POST["icerik"]);
	 
   
    $kelimeler = $db->query("SELECT * from sayfalar WHERE isim='$isim' ");
    
    if(empty($isim) || empty($konu_kisalt) || empty($konu_bolumu) || empty($icerik) ) {
    	$_code = 400; 
		$jsonArray["hata"] = TRUE; 
        $jsonArray["hataMesaj"] = "Boş Alan Bırakmayınız."; 
	}
   else if($kelimeler->rowCount() !=0) {
    	$_code = 400;
        $jsonArray["hata"] = TRUE; 
        $jsonArray["hataMesaj"] = "Sayfa kayıtlı."; 
    }else {
    	
			$ex = $db->prepare("insert into sayfalar  set 
			isim= :ad, 
			konu_kısalt=  :ozet,
			konu_bölümü=  :bolum,
			icerik=  :icerikim");
		$ekle = $ex->execute(array(
			"ad" => $isim,
			"ozet" => $konu_kisalt,
			"bolum" => $konu_bolumu,
			"icerikim" => $icerik
			
		));
		
		
		if(	$ekle) {
			$_code = 201;
			$jsonArray["mesaj"] = "Sayfa Ekleme Başarılı.";
		}else {
			$_code = 400;
			 $jsonArray["hata"] = TRUE; 
       		 $jsonArray["hataMesaj"] = "Sistem Hatası.";
		}
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