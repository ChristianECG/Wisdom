<?php
session_start();
require("librerias/encriptar.php");
require("librerias/chats.php");
//echo "<head><meta http-equiv='Content-type' content='text/html; charset=utf-8' />";
?>
<form method="post">
	<input type="text" name="clave" id="clave" autocomplete="off" value="wXnCJC" placeholder="Clave" ><br>
	<input type="text" name="a" id="a" autocomplete="off" autofocus value="" placeholder="Texto" required><br>
	<button formaction="" name="c">Encriptar</button>
	<button formaction="" name="d">Desencriptar</button>
</form>
<textarea cols="50" rows="30" disabled>
<?
if(isset($_POST["c"]))
	echo encriptaclave($_POST['a'],$_POST["clave"]);

if(isset($_POST["d"]))
	echo desencriptaclave($_POST['a'],$_POST["clave"]);
?>

<?
//echo encriptaporusuario("cba")."<br>";
//echo desencriptaporusuario("3eQ1!z3eQ1!za84kl23eQ1!z2gWxO53eQ1!za84kl23eQ1!za84kl23eQ1!za84kl23eQ1!z")."<br>";
//echo generaclaves();
//generaclaves();
//serepite();
?>

</textarea>