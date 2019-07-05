<?php
session_start();

mysql_connect("localhost", "root", "" );
mysql_select_db("wisdom" );
mysql_query("SET NAMES 'utf8'");
echo "<link rel=stylesheet type='text/css' href=loader.css><div class=loader id=loader>loading...</div>";

error_reporting(0);

	$unidad= $_POST["Unidad"];
	$tema= $_POST["Tema"];
	$titulo= $_POST["Titulo"];
	$contenido= $_POST["Contenido"];
	$filas = $_POST["Filas"];
	$columnas = $_POST["Columnas"];
	$video = $_POST["Video"];
	$tipo = $_POST["Tipo"];
	$autor = $_SESSION["wisdom"];

	$tabladatos = "";
	$tablaresultados = "";
	$preguntas = "";
	$ideas = "";
	$cuadrocompara = $_POST["ti"]."+".$_POST["td"]."+";

		$a=0;
		while($a<100){
			$tabladatos = $tabladatos.$_POST[$a]."+";
			$tablaresultados = $tablaresultados.$_POST['r'.$a]."+";
			$a++;
		}
		$a=0;
		while($a<10){
			$preguntas = $preguntas.$_POST['p'.$a]."+";
			$ideas = $ideas.$_POST['i'.$a]."+";
			$cuadrocompara = $cuadrocompara.$_POST['ii'.$a]."+".$_POST['id'.$a]."+";
			$a++;
		}

		if(isset($_FILES['Imagen'])){
			$nombre_img = $_FILES['Imagen']['name'];
			$type = $_FILES['Imagen']['type'];
			$tamaño = $_FILES['Imagen']['size'];
			$id = $unidad."_".$tema.".png";
			$directorio = $_SERVER['DOCUMENT_ROOT'].'/wisdom/contenido/';
			move_uploaded_file($_FILES['Imagen']['tmp_name'],$directorio.$id);
		}
		
		$imagen = $id;

	$query = "INSERT INTO contenido (Unidad, Tema, Tipo, Titulo, Imagen, Contenido, Autor, Filas, Columnas, Tabladatos, Tablaresultados, Video, Preguntas, Ideas, Cuadrocompara) VALUES('$unidad','$tema','$tipo','$titulo','$imagen','$contenido','$autor','$filas','$columnas','$_$tabladatos','$tablaresultados','$video','$preguntas','$ideas','$cuadrocompara')";
	mysql_query($query);
	echo "<html><head></head><meta HTTP-EQUIV='Refresh' CONTENT='0; URL=crear.php?g=true'></html>";?>