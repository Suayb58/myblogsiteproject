
<?php
function menu_olustur($page){
	$page=@$_GET["s"];
	if(empty($page) || !is_numeric($page)){
		$page=1;
	}
		$kacar=5;
		$ksayisi=mysql_num_rows(mysql_query("select * from sayfalar"));
		$ssayisi=ceil($ksayisi/$kacar);
		$nereden=($page*$kacar)-$kacar;
		$bul=mysql_query("select * from sayfalar order by id desc limit $nereden,$kacar");
		while($goster=mysql_fetch_array($bul)){
			extract($goster);
			echo "<div class=\"konu_alani\">";
			echo "<ul>";
			echo "<center>";
			echo "<i class=\"fa fa-sitemap\" title=\"konu adı\" ><a href=\"yazi.php?page={$goster['id']}\">{$goster[isim]}</a></i>";
			
			echo "<br>";
			echo "<br>";
			
			echo "<i class=\"fa fa-line-chart\" title=\"hit sayısı\" ><a href=\"#\">{$goster[hit]}</a></i>";
			
			
			echo "<i class=\"fa fa-calendar\" title=\"tarih\" ><a href=\"#\">{$goster[tarih]}</a></i>";
			
			echo "<br>";
			
			echo "<div class=\"konu_kisalt\">";
			
			echo "<li>{$goster[konu_kısalt]}</li>";
			
			echo "</div>";
			
			
			echo "<br>";
			
			echo "<div class=\"devamini_oku\">";
			
			echo "<li><a href=\"yazi.php?page={$goster[id]}\">Devamını Oku</a></li>";
			echo "</div>";
			echo "<br>";	
			echo "</ul>";
			echo "</div>";
			echo "<br>";
			
			
		}
		
		
		echo "<center>";
		echo "<div>";
		
		for($i=1;$i<=$ssayisi;$i++){
			echo "<a class=\"sira\"	href='index.php?s={$i}'>{$i}</a>";
			
		}
		echo "</div>";
		echo "</center>";
		
		
		

		
}
		
		
		

?>

<?php
function enson_konu($page){
	$sorgu=mysql_query("select * from sayfalar order by id desc limit 4 ");
	while($bilgi=mysql_fetch_array($sorgu)){
		echo "<i class=\"fa fa-tags\"  title=\"konu adı\"><a href=\"yazi.php?page={$bilgi[id]}\">{$bilgi[isim]}</a></i> ";
		echo "<br>";
		echo "<i class=\"fa fa-clock-o\"  title=\"konu tarihi\"><a href=\"#\">{$bilgi[tarih]}</a></i> ";
		echo "<br>";
		echo "<br>";
	}
		
}
?>

<?php
function enpopuler_konular($page){
	$sorgu=mysql_query("select * from sayfalar order by hit desc limit 4 ");
	while($bilgi=mysql_fetch_array($sorgu)){
		
		echo "<i class=\"fa fa-tags\"  title=\"konu adı\"><a href=\"yazi.php?page={$bilgi[id]}\">{$bilgi[isim]}</a></i> ";
		echo "<br>";
		echo "<i class=\"fa fa-eye\"  title=\"hit sayısı\"><a href=\"#\">{$bilgi[hit]}</a></i> ";
		echo "<br>";
		echo "<br>";
	}
		
}
?>



