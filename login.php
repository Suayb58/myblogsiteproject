<?php require_once("includes/config.php") ;?>
<?php include("includes/header.php") ;?>
<center>
<div class="login">
	<h2><font color=#333>Yönetici Girişi</font></h2>	
<form action="sys_kontrol.php" method="post">
<p>Kullanıcı Adı<br /><input id="submit" type="text" name="username"/> </p>	

<p>Kullanıcı Şifresi<br /><input id="submit" type=password name="password"/> </p>	

<p><input class="giris" type="submit"  id="submit" value="Giriş"/> </p>		
						
				
</form>	
		
	
</div>
	
	
	
</center>


<?php include("includes/footer.php"); ?>
