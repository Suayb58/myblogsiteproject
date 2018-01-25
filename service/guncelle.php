<?php
include "conn.php";
include "httpFonksiyonlari.php";
$islem = isset($_GET["islem"]) ? addslashes(trim($_GET["islem"])) : null;
$jsonArray = array(); 
$jsonArray["hata"] = FALSE; 

$_code = 200; 

	
 if($_SERVER['REQUEST_METHOD'] == "PUT") {
     $gelen_veri = json_decode(file_get_contents("php://input")); 
    	
    	
     if(	isset($gelen_veri->id) && 
     		isset($gelen_veri->isim) && 
     		isset($gelen_veri->konu_kısalt) && 
     		isset($gelen_veri->konu_bölümü) && 
     		isset($gelen_veri->icerik)
     	) {
     		
     		
				$q = $db->prepare("UPDATE sayfalar SET isim= :ad, konu_kısalt= :ozet, konu_bölümü= :bolum, icerik= :icerikim WHERE id= :user_id ");
			 	$update = $q->execute(array(
						"user_id" => $gelen_veri->id,
			 			"ad" => $gelen_veri->isim,
			 			"ozet" => $gelen_veri->konu_kısalt,
			 			"bolum" => $gelen_veri->konu_bölümü,
			 			"icerikim" => $gelen_veri->icerik
			 				 	
			 	));
			 	
			 	if($update) {
			 		$_code = 200;
			 		$jsonArray["mesaj"] = "Sayfa Güncelleme Başarılı";
			 	}
			 	else {
			 		
			 		$_code = 400;
					$jsonArray["hata"] = TRUE;
		 			$jsonArray["hataMesaj"] = "Sistemsel Bir Hata Oluştu";
				}
		}else {
			
			$_code = 400;
			$jsonArray["hata"] = TRUE;
	 		$jsonArray["hataMesaj"] = "id,isim,konu_kısalt,konu_bölümü,icerik Verilerini json olarak göndermediniz.";
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
?>