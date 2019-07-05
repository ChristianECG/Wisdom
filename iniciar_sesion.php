<?php
require("librerias/encriptar.php");
session_start();

mysql_connect("localhost", "root", "" ) or die(mysql_error());
mysql_select_db("wisdom" ) or die(mysql_error());
echo "<link rel=stylesheet type='text/css' href=loader.css><div class=loader id=loader>loading...</div>";

$usuario=strtolower($_POST['Usuario']);
$email=$usuario;
$contra=$_POST['Contra'];
$contra=encriptaclave($contra,"wXnCJC");
if ($contra==NULL) {
	echo "<html><head></head><meta HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php?s=2'></html>";
}
else{
	
	$query = mysql_query("SELECT Usuario,Contra FROM usuarios WHERE Usuario = '$usuario'" ) or die(mysql_error());
	$data = mysql_fetch_array($query);
	
	$query2 = mysql_query("SELECT Usuario,Contra FROM usuarios WHERE Correo = '$email'" ) or die(mysql_error());
	$data2 = mysql_fetch_array($query2);

	if($data['Contra'] != $contra && $data['Contra'] != null) {
		echo "<html><head></head><meta HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php?s=0'></html>";
	}
	else{
		if($data2['Contra'] != $contra && $data2['Contra'] != null) {
			echo "<html><head></head><meta HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php?s=0'></html>";
		}
		else{
			if($data['Contra'] != null) {$query = mysql_query("SELECT Usuario,Contra FROM usuarios WHERE Usuario = '$usuario'" ) or die(mysql_error());}
			
			else if($data2['Contra'] != null) {$query = mysql_query("SELECT Usuario,Contra FROM usuarios WHERE Correo = '$usuario'" ) or die(mysql_error());}
			
			$row = mysql_fetch_array($query);
			$_SESSION["wisdom"] = $row['Usuario'];

			echo "<html><head></head><meta HTTP-EQUIV='Refresh' CONTENT='0; URL=home.php'></html>";
		}
	}
}
?>