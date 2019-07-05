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
				
				<h1>Edita el diseño de la pagina</h1>
				<p>
				<h2>Cambia el CSS</h2>
					<form action="css.php" enctype="multipart/form-data" method="post">
						
						<input id="fotoperfil" name="fotoperfil" type="file">
						<br><input type="submit" value="Cambiar estilo">
						<input type="hidden" id="a" name="a" value="css">
					</form><p>
					
				<h2>Cambia la letra de la pagina de inicio</h2>
					<form action="css.php" enctype="multipart/form-data" method="post">
						
						<input id="fotoperfil" name="fotoperfil" type="file">
						<br><input type="submit" value="Cambiar letra">
						<input type="hidden" id="a" name="a" value="letra">
					</form><p>
					
				<h2>Cambia la letra del header<br>(Las letras de arriba que traen el nombre y la descripción)</h2>
					<form action="css.php" enctype="multipart/form-data" method="post">
						
						<input id="fotoperfil" name="fotoperfil" type="file">
						<br><input type="submit" value="Cambiar letra">
						<input type="hidden" id="a" name="a" value="letra2">
					</form>
				</p>
				<h2>Otros</h2>
					<form action="css.php?a=otro" enctype="multipart/form-data" method="post">
						
						<input id="fotoperfil" name="fotoperfil" type="file">
						<br><input type="submit" value="Cambiar">
						<input type="hidden" id="a" name="a" value="otro">
					</form>
				</p>
				<a href="principal.css"><input type="submit" value="Descargar"></a>
			</header>
			<div class="contenido">
				

				
			</div>
		</article>
	</section>
	
	
	<div class="a"></div>
	
	<footer id="pie-de-pagina"><p>&copy; 2018 Wisdom</p></footer>
	
	
</body>
</html>