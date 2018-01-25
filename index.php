<?php require_once("includes/config.php") ;?>
<?php include("includes/header.php") ;?>
<?php include("includes/functions.php") ;?>


<link href="css/style.css" rel="stylesheet" />

<?php error_reporting(E_ALL ^ E_NOTICE);?>
<div class="container">
<div class="row">
<div class="col-md-3">
<div class="enson"	>
<h3>
<i class="fa fa-spinner" aria-hidden="true"><a href="#">En Son Konular</a></i>
</h3>
<hr />
<?php
	enson_konu($_GET[page]);
	if($_GET[page]){
		header("location:yazi.php");
	}

?>
			
</div>
<br />
<div class="kategori enson">
<i class="fa fa-folder-open" aria-hidden="true"><a data-toggle="collapse" href="#collapseExample" aria-expanded="false">Kategoriler</a></i>	
<div class="collapse" id="collapseExample">
<hr />
<div class="kategoriyazi">
<i class="fa fa-archive" aria-hidden="true"><a href="#">Sıradışı Bilgiler</a></i>
<br />	
		
<i class="fa fa-archive" aria-hidden="true"><a href="#">Ders Dosyaları</a></i>
<br />	
<i class="fa fa-archive" aria-hidden="true"><a href="#">İnceleme-Yardım</a></i>

			
</div>
	
		
				
</div>


</div>
<br />
</div>	

<div class="col-md-6">
<br />
<?php
	//echo "<div class=\"konu_alani\"";
	menu_olustur($_GET[page]);
	if($_GET[page]){
		header("location:yazi.php");
	}
	//echo "</div>";
?>
</div>

<div class="col-md-3">
<div class="enson"	>
<h3>
<i class="fa fa-thumbs-up" aria-hidden="true"><a href="#">En Popüler Konular</a></i>	
</h3>
<hr />
<?php
	enpopuler_konular($_GET[page]);
	if($_GET[page]){
		header("location:yazi.php");
	}
?>	
</div>
</div>


</div>	
</div>

<br />


<?php include("includes/footer.php"); ?>


