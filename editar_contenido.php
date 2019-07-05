<?php

session_start();

mysql_connect("localhost", "root", "" ) or die(mysql_error());
mysql_select_db("wisdom" ) or die(mysql_error());
mysql_query("SET NAMES 'utf8'");
echo "<link rel=stylesheet type='text/css' href=loader.css><div class=loader id=loader>loading...</div>";

error_reporting(0);

	$id = $_POST["id"];
	$unidad= $_POST["Unidad"];
	$tema= $_POST["Tema"];
	$titulo= $_POST["Titulo"];
	$contenido= $_POST["Contenido"];
	$filas = $_POST["Filas"];
	$columnas = $_POST["Columnas"];
	$video = $_POST["Video"];
	$tipo = $_POST["Tipo"];
	$imagen = $_POST["Imagen"];
	$autor = $_SESSION["wisdom"];

	$tabladatos = "";
	$tablaresultados = "";
	$preguntas = "";
	$ideas = "";
	$ti = $_POST["ti"];
	$td = $_POST["td"];
	$cuadrocompara = $ti."+".$td."+";

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
			$idimg = $unidad."_".$tema.".png";
			$directorio = $_SERVER['DOCUMENT_ROOT'].'/wisdom/contenido/';
			move_uploaded_file($_FILES['Imagen']['tmp_name'],$directorio.$idimg);
		}
		
				$imagen = $idimg;
				
				mysql_query("UPDATE contenido SET Unidad='$unidad' WHERE id =$id");
				mysql_query("UPDATE contenido SET Tema='$tema' WHERE id =$id");
				mysql_query("UPDATE contenido SET Titulo='$titulo' WHERE id =$id");
				mysql_query("UPDATE contenido SET Contenido='$contenido' WHERE id =$id");
				mysql_query("UPDATE contenido SET Filas='$filas' WHERE id =$id");
				mysql_query("UPDATE contenido SET Columnas='$columnas' WHERE id =$id");
				mysql_query("UPDATE contenido SET Tabladatos='$tabladatos' WHERE id =$id");
				mysql_query("UPDATE contenido SET Tablaresultados='$tablaresultados' WHERE id =$id");
				mysql_query("UPDATE contenido SET Video='$video' WHERE id =$id");
				mysql_query("UPDATE contenido SET Preguntas='$preguntas' WHERE id =$id");
				mysql_query("UPDATE contenido SET Ideas='$ideas' WHERE id =$id");
				mysql_query("UPDATE contenido SET Cuadrocompara='$cuadrocompara' WHERE id =$id");
				if($imagen!=0&&$imagen!=""&&$imagen!=null){
					mysql_query("UPDATE contenido SET Imagen='$imagen' WHERE id =$id");
				}

				echo "<html><head></head><meta HTTP-EQUIV='Refresh' CONTENT='0; URL=leer.php?Orden=$id'></html>";
?>