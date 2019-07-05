<? require("librerias/encriptar.php"); ?>
<?php
	session_start();
	mysql_connect("localhost", "root", "" ) or die(mysql_error());
	mysql_select_db("wisdom" ) or die(mysql_error());
	mysql_query("SET NAMES 'utf8'");
	echo "<link rel=stylesheet type='text/css' href=loader.css><div class=loader id=loader>loading...</div>";
	$usu = $_SESSION['wisdom'];

if(isset($_FILES['fotoperfil'])){
	$nombre_img = $_FILES['fotoperfil']['name'];
	$tipo = $_FILES['fotoperfil']['type'];
	$tamaño = $_FILES['fotoperfil']['size'];
	$id = $usu.".png";
	
	if($tipo=="image/gif"||$tipo=="image/jpeg"||$tipo=="image/jpg"||$tipo=="image/png"){
		$query = mysql_query("UPDATE usuarios SET Fotoperfil='$id' WHERE Usuario = '$usu'") or die(mysql_error());
		$directorio = $_SERVER['DOCUMENT_ROOT'].'/wisdom/perfil/';
		move_uploaded_file($_FILES['fotoperfil']['tmp_name'],$directorio.$id);
		header("Location:perfil.php?perfilguardado");
	}
	else{
		header("Location:perfil.php?notipo");
	}
}

if(isset($_GET["datos"])){
	$usuario = $_SESSION['wisdom'];
	$docente = $_POST['docente'];
	$padre = $_POST['padre'];
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$nacimiento = $_POST['nacimiento'];
	$zonas = $_POST['zonas'];
	$progreso_existe = mysql_query("SELECT * FROM progreso WHERE Usuario_Alumno = '$usuario'");
	$progreso_exist = mysql_num_rows($progreso_existe);
	mysql_query("UPDATE usuarios SET Nombre='$nombre' WHERE Usuario='$usuario'");
	mysql_query("UPDATE usuarios SET Correo='$correo' WHERE Usuario='$usuario'");
	mysql_query("UPDATE usuarios SET Nacimiento='$nacimiento' WHERE Usuario='$usuario'");
	mysql_query("UPDATE usuarios SET Zonahoraria='$zonas' WHERE Usuario='$usuario'");
	if($progreso_exist>0){
		mysql_query("UPDATE progreso SET Usuario_Docente='$docente' WHERE Usuario_Alumno='$usuario'");
		mysql_query("UPDATE progreso SET Usuario_Padre='$padre' WHERE Usuario_Alumno='$usuario'");
	}
	else{
		mysql_query("INSERT INTO progreso (Usuario_Alumno,Usuario_Docente,Usuario_Padre) VALUES ('$usuario','$docente','$padre')");
	}
	header("Location:perfil.php?actualizado");
}

if(isset($_GET["contra"])){
	$usuario = $_SESSION['wisdom'];
	$actual= $_POST['actual'];
	$nueva= $_POST['nueva'];
	$confirma= $_POST['confirma'];
	if($nueva==$confirma){
		$existente = mysql_query("SELECT Contra FROM usuarios WHERE Usuario = '$usuario'");
		$existente = mysql_fetch_array($existente);
		if(encriptaclave($actual,"wXnCJC")==$existente[0]){
			$clave=encriptaclave($nueva,"wXnCJC");
			mysql_query("UPDATE usuarios SET Contra='$clave' WHERE Usuario = '$usuario'");
			header("Location:perfil.php?contraguardada");
		}
		else{
			header("Location:perfil.php?contranocoincide");
		}
	}
	else{
		header("Location:perfil.php?nocoinciden");
	}
}

?>