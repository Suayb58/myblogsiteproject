<?php require_once("includes/config.php") ;

if(!isset($_SESSION['uname'])){
	header("location:login.php");
}

?>
<?php include("includes/header.php") ;?>
<?php error_reporting(E_ALL ^ E_NOTICE);?>

<link href="css/style.css" rel="stylesheet" />

<?php
if($_GET[kayit]==1){
	if(!isset($_POST[isim]) || empty($_POST[isim])){
		$hata="Tüm alanların doldurulması gerekiyor.";
	}
	
	
	if(!isset($_POST[icerik]) || empty($_POST[icerik])){
		$hata="Tüm alanların doldurulması gerekiyor.";
	}
	
	if(!$hata){
		mysql_query("INSERT INTO sayfalar(isim,konu_bölümü,konu_kısalt,icerik) VALUES('$_POST[isim]','$_POST[konu_bolumu]','$_POST[konu_kisalt]','$_POST[icerik]')");
		
		$mesaj="Kayıt başarıyla Oluşturulmuştur.";
	}


}
?>


<div class="yonetim_menu">
<ul>
<li><a href="yeni_sayfa.php">Yeni Sayfa Oluştur</a></li>

<li><a href="msayfalar.php">Mevcut Konu Sayfaları</a></li>

<li><a href="sayfa_guncelle.php">Sayfa Güncelleme</a></li>

<li><a href="sayfalar.php">Sayfa Silme</a></li>

<li><a href="logout.php">Çıkış</a></li>
</ul>
</div>
<br />
<center>
<h2>Yeni Sayfa</h2>
<?php
if($hata){
	echo "<p>{$hata}</p>";
}
	
if($mesaj){
	echo "<p>{$mesaj}</p>";
}	
?>
<form name="yeni_sayfa" action="yeni_sayfa.php?kayit=1" method="post">

<p class="isimclasi">İsim:<br /><input id="submit" type="text" name="isim"/>
</p>
<br />


<p class="isimclasi">Konu Bölümü:<br /><input id="submit" type="text" name="konu_bolumu"/>
</p>
<br />

<div class="isimclasi">Konunun Kısaltılmış Hali</div>
<br />

<div class="ck">
<textarea class="ckeditor"	name="konu_kisalt" cols="70" rows="10" ><?php
echo $bilgi[konu_kısalt]
?>	
</textarea>
</div>
<br />

<div class="isimclasi">Konunun İçeriği</div>
<br />


<div class="ck">
<textarea class="ckeditor"	name="icerik" cols="70" rows="10" ><?php
echo $bilgi[icerik]
?>	
</textarea>
</div>
<br />
<p><input type="submit" class="giris" id="submit" value="Oluştur"/></p>


	
	
</form>
</center>

<?php include("includes/footer.php"); ?>


