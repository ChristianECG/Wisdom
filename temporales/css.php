<?php
	session_start();
	mysql_connect("localhost", "root", "" ) or die(mysql_error());
	mysql_select_db("wisdom" ) or die(mysql_error());
	mysql_query("SET NAMES 'utf8'");
	$a=$_GET['a'];
	$usu = $_SESSION['wisdom'];
		if($a=='css'){
			move_uploaded_file($_FILES['fotoperfil']['tmp_name'],'principal.css');
			header("Location:css1.php");
		}
		if($a=='letra'){
			move_uploaded_file($_FILES['fotoperfil']['tmp_name'],'fonts/tituloportada.ttf');
			header("Location:css1.php");
		}
		if($a=='letra2'){
			move_uploaded_file($_FILES['fotoperfil']['tmp_name'],'fonts/tituloheader.ttf');
			header("Location:css1.php");
		}
		if($a=='otro'){
			move_uploaded_file($_FILES['fotoperfil']['tmp_name'],'a');
			header("Location:css1.php");
		}
?>