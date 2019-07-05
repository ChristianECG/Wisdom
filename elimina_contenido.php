<?php
	session_start();
	mysql_connect("localhost", "root", "" ) or die(mysql_error());
	mysql_select_db("wisdom" ) or die(mysql_error());
	mysql_query("SET NAMES 'utf8'");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Wisdom</title>
<link rel="icon" type="image/png" href="logo.png" />
<link rel="stylesheet" type="text/css" href="principal.css">
</head>

<body>

<?php
if(isset($_SESSION['wisdom'])){}else{header("Location:index.php");}
	$queryusuario = mysql_query("SELECT * FROM usuarios WHERE Usuario = '$_SESSION[wisdom]'" ) or die(mysql_error());
	$rowusuario = mysql_fetch_array($queryusuario);
	$usuario = $rowusuario['Nombre'];
	$ruta_fotoperfil = $rowusuario['Fotoperfil'];
	$cuenta = $rowusuario['Cuenta'];
?>

	<header id="header">
		<a id="logo" href="index.php"><img src="logo.png" width="60px" /></a>
		<a id="cabecera" href="index.php">
			<span class="nombre">Wisdom</span>
			<span class="descripcion"><b>Aula Virtual de Temas de Filosof&iacute;a</b></span>
		</a>
		
		<nav>
			<ul>
				<li><img src="<? echo "perfil/".$ruta_fotoperfil ?>" width="50px" height="50px" style="vertical-align: middle; border-radius: 20%"></li>
				<li><a href="#"><? echo $usuario ?></a>
					<ul>
						<li><table><tr><a href="#">Perfil</a></tr>
						<tr><a href="cerrar_sesion.php">Cerrar sesi&oacute;n</a></tr></table></li>
					</ul>
				</li>
			</ul>
		</nav>
	</header>
	<section id="seccion">
		<article>
			<header>
	<? 
	if(isset($_GET['Confirm']) && isset($_GET['Orden'])){
		
		$id = $_GET['Orden'];
		
		$query = "delete from contenido where id = '$id'";
		mysql_query($query);
		echo "<html><head></head><meta HTTP-EQUIV='Refresh' CONTENT='0; URL=editar.php?e=true'></html>";
	}
	else if(isset($_GET['Orden'])){
		$Orden = $_GET['Orden'];
		$query = mysql_query("SELECT * FROM contenido WHERE id='$Orden'") or die(mysql_error());
		$info = mysql_fetch_array($query);
		$tema = $info['Tema'];
		$titulo=$info['Titulo'];
		$tipo=$info['Tipo'];
		echo "<br><div class='alerta alerta-error'>¿Est&aacute;s seguro de querer eliminar el ECA ".$tema." - ".$titulo." (".$tipo.") ?</div></br>";
		echo "<center><table><tr><td><center><a  href=elimina_contenido.php?Confirm=true&&Orden=$Orden><button class=botonaceptar>Sí, borrar</button></a></center></td>";
		echo "<td><center><a  href=editar.php><button class=botoncancelar>No, cancelar</button></a><center></td></tr></table></center>";
	}
	else{
		echo "<html><head></head><meta HTTP-EQUIV='Refresh' CONTENT='0'; URL=editar.php></html>";
	}
	?>
			</header>
			<div class="contenido">
				

				
			</div>
		</article>
	</section>
	
	
	<div class="a"></div>
	
	<footer id="pie-de-pagina"><p>&copy; 2018 Wisdom</p></footer>
	
	
</body>
</html>