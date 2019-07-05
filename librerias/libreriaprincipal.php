<?
function conectar(){
	session_start();
	mysql_connect("localhost", "root", "" ) or die(mysql_error());
	mysql_select_db("wisdom" ) or die(mysql_error());
	mysql_query("SET NAMES 'utf8'");
}

function ajustarpiedepagina(){
	?>
	<script type='text/javascript' src='js/jquery.js'></script>
	<script type="text/javascript">
		var posicion = $("#divlimite").offset().top;
		var tam = window.innerHeight.toString();
		var height = tam-posicion;
		var height = height-40;
		var height = height+"px";
		if(posicion<tam){
			document.getElementById("divlimite").style.height = height;
		}
	</script>
	<?
}

function head($titulo){
	echo "<head>
	<meta charset='utf-8'>
	<title>$titulo - Wisdom</title>
	<link rel=icon type='image/png' href=/wisdom/logo.png>
	<link rel=stylesheet type='text/css' href=principal.css>
	</head>";

}

function imagenperfil($ruta,$style,$width,$height){
	$width=$width."px";
	$height=$height."px";
	echo"<img src=perfil/".$ruta." class=$style width='$width' height='$height'>";
}

function cabecera($titulo){
	conectar();

	echo "<!doctype html>
	<html>";
	head($titulo);
	echo "<body class=body".rand(1,8)." id=body>";

	if(isset($_SESSION['wisdom'])){}else{header("Location:index.php");}
		$queryusuario = mysql_query("SELECT * FROM usuarios WHERE Usuario = '$_SESSION[wisdom]'" ) or die(mysql_error());
		$rowusuario = mysql_fetch_array($queryusuario);
		$usuario = $rowusuario['Nombre'];
		$ruta_fotoperfil = $rowusuario['Fotoperfil'];
		$cuenta = $rowusuario['Cuenta'];

		echo "<header id='header'>
			<a id='logo' href='index.php'><img src='logo.png' width='60px' /></a>
			<a id='cabecera' href='index.php'>
				<span class='nombre'>Wisdom</span>
				<span class='descripcion'><b>Aula Virtual de Temas de Filosof&iacute;a</b></span>
			</a>

			<nav>
				<ul>
					<li>"; imagenperfil($ruta_fotoperfil,"fotoperfil",50,50); echo "</li>
					<li><a href='#'>$usuario</a>
						<ul>
							<li><table><tr><a href='perfil.php'>Perfil</a></tr>
							<tr><a href='cerrar_sesion.php'>Cerrar sesi&oacute;n</a></tr></table></li>
						</ul>
					</li>
				</ul>
			</nav>
		</header>
		<section id='seccion'>
			<article>
				<header>";
	return array($usuario,$cuenta,$ruta_fotoperfil);
};

function footer(){
		echo "</section><div id=divlimite></div>";
		ajustarpiedepagina();
		echo "<footer id=pie-de-pagina><p>&copy; 2018 Wisdom</p></footer>
	</body>
	</html>";
}

function permisos($cuenta,$permisos){
	$i=0;
	$aut=0;
	while($i<count($permisos)){
		if($permisos[$i]==$cuenta){
			$aut=1;
		}
		$i++;
	}
	if($aut==1){}else{header("Location:index.php");}
}
?>