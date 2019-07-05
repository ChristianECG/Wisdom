<?php
require("librerias/encriptar.php");
session_start();

mysql_connect("localhost", "root", "" ) or die(mysql_error());
mysql_select_db("wisdom" ) or die(mysql_error());
mysql_query("SET NAMES 'utf8'");
echo "<link rel=stylesheet type='text/css' href=loader.css><div class=loader id=loader>loading...</div>";

if (isset($_POST["Nombre"] ) ) {
	$nombre= $_POST["Nombre"];
	$usuario= strtolower($_POST["Usuario"]);
	$correo = strtolower($_POST["Correo"]);
	$contra = $_POST["Contra"];
	$contra = encriptaclave($contra,"wXnCJC");
	$nac = $_POST["Nacimiento"];
	$tipo = $_POST["Tipo"];
	$reg = date("d/m/Y h:i A");

	if($nombre==NULL|$usuario==NULL|$correo==NULL|$contra==NULL|$nac==NULL) {
		echo "<html><head></head><meta HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php?r=0'></html>";
	}else{

		if(1==1){
			$checkcorreo = mysql_query("SELECT Correo FROM usuarios WHERE Correo='$correo'" ) ;
			$correo_exist = mysql_num_rows ($checkcorreo);
			
			$checkusuario = mysql_query("SELECT Usuario FROM usuarios WHERE Usuario='$usuario'" ) ;
			$usuario_exist = mysql_num_rows ($checkusuario);

			if ($correo_exist>0) {
				echo "<html><head></head><meta HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php?r=2'></html>";
			}
			else if ($usuario_exist>0) {
				echo "<html><head></head><meta HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php?r=2'></html>";
			}
			else{
				$query = "INSERT INTO usuarios (Fotoperfil, Nombre, Usuario, Contra, Cuenta, Correo, Nacimiento, Registro, Zonahoraria) VALUES('default.png','$nombre','$usuario','$contra','$tipo','$correo','$nac','$reg','America/Mexico_City')";
				mysql_query($query) or die(mysql_error());
				if(isset($_POST['Nombre'])){ $_SESSION['wisdom']=$usuario; }
				date_default_timezone_set("America/Mexico_City");
				$reg = date("d/m/Y h:i A");
				mysql_query("INSERT INTO chat (De, Para, Fecha, Contenido) VALUES ('Wisdom','$usuario','$reg','¡Bienvenido a Wisdom!')");
				echo "<html><head></head><meta HTTP-EQUIV='Refresh' CONTENT='0; URL=home.php'></html>";
			}
		}
	}
}
?>