<?php require_once("includes/config.php") ;?>
<?php require_once("includes/functions.php") ;?>
<?php require_once("includes/header.php") ;?>

<?php error_reporting(E_ALL ^ E_NOTICE);?>


<div class="container">
<div class="row">
<div class="col-md-3 enson"	>

<h3><i class="fa fa-bar-chart"><a href="#">İstatistik</a></i></h3>	
<hr />
	
<?php  

	if($_GET[page])
	//echo "<div class=\"istatistik_alani\"> ";
	$sorgu=mysql_query("select * from sayfalar WHERE id='$_GET[page]'");
	$bilgi=mysql_fetch_array($sorgu);
	{
	mysql_query("UPDATE sayfalar SET hit=hit+1 WHERE id='$_GET[page]'");
	echo "<ul>";
	echo "<i class=\"fa fa-bookmark\"><a href=\"#\">{$bilgi[konu_bölümü]}</a></i>";
	echo "<br />";
	echo "<br />";
	
	echo "<i class=\"fa fa-eye\"><a href=\"#\">{$bilgi[hit]} tık</a></i>";
	echo "<br />";
	echo "<br />";
	echo "<i class=\"fa fa-clock-o\"><a href=\"#\">{$bilgi[tarih]}</a></i>";
	echo "<br />";
	echo "<br />";
	
	
}
	
?>
		
				
</div>
	
<div class="col-md-6">
<br />
<div class="disicerik">
<div class="icerik"	>
<?php
	
	$sorgu=mysql_query("select * from sayfalar WHERE id='$_GET[page]'");
	
	$bilgi=mysql_fetch_array($sorgu);
	echo "<ul id=\"konu_adi\">";
	echo "<li>{$bilgi[isim]}</li>";
	echo "</ul>";
	echo "<br />";
	
	echo "<ul id=\"konu_icerik\">";
	echo "<li>{$bilgi[icerik]}</li>";
	echo "</ul>";
	
	
?>	
</div>
</div>	
</div>	
<div class="col-md-3 enson">
<h3>
<i class="fa fa-spinner" aria-hidden="true"><a href="#">En Son Konular</a></i>
</h3>
<hr />
<?php
	
$sorgu=mysql_query("select * from sayfalar order by hit desc limit 4 ");
	while($bilgi=mysql_fetch_array($sorgu)){
		
		echo "<i class=\"fa fa-tags\"  title=\"konu adı\"><a href=\"yazi.php?page={$bilgi[id]}\">{$bilgi[isim]}</a></i> ";
		echo "<br>";
		echo "<i class=\"fa fa-eye\"  title=\"hit sayısı\"><a href=\"#\">{$bilgi[hit]}</a></i> ";
		echo "<br>";
		echo "<br>";
	}
	
?>	
	
</div>
		
	
	
</div>	
</div>
<br />

<?php require_once("includes/footer.php") ;?>