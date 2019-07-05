<?php
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Wisdom</title>
<link rel="shortcut icon" href="logo.png" />
<link rel="stylesheet" type="text/css" href="principal.css">
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '2151279901758237',
      cookie     : true,
      xfbml      : true,
      version    : '{latest-api-version}'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
	
	FB.getLoginStatus(function(response) {
    	statusChangeCallback(response);
	});
</script>

</head>

<body>
<?php
if(isset($_SESSION['wisdom'])){
	header("Location:home.php");
}
?>

	<header id="header">
		<a id="logo"><img src="logo.png" width="60px" /></a>
		<a id="cabecera" class="tituloheader">
			<span class="nombre">Wisdom</span>
			<span class="descripcion"><b>Aula Virtual de Temas de Filosof&iacute;a</b></span>
		</a>
		
		<nav>
			<ul>
				<li><a href="#">Iniciar sesi&oacute;n</a>
					<ul>
						<table>
						<form action="iniciar_sesion.php" method="post">
							<tr>
								<td>Usuario</td>
								<td><input name="Usuario" id="Usuario" type="text"></td>
							</tr>
							<tr>
								<td>Contrase&ntilde;a</td>
								<td><input name="Contra" id="Contra" type="password"></td>
							</tr>
							<tr>
								<td colspan="2">
									<center><button type="submit" class="ini">Iniciar sesi&oacute;n</button></center>
							</form>		
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<center><fb:login-button 
									  scope="public_profile,email"
									  onlogin="checkLoginState();">
									</fb:login-button></center> 
								</td>
							</tr>
						</table>
					</ul>
				</li>
				<li><a href="#">Registrarse</a>
			      <ul>
			        <table>
			          <form action="registrar.php" method="post">
			            <tr>
			              <td>Nombre</td>
		                    <td><input name="Nombre" id="Nombre" type="text"></td>
		                  </tr>
			            <tr>
			              <td>Usuario</td>
		                    <td><input name="Usuario" id="Usuario" type="text"></td>
		                  </tr>
			            <tr>
			              <td>Correo electr&oacute;nico</td>
		                    <td><input name="Correo" id="Correo" type="mail"></td>
		                  </tr>
			            <tr>
			              <td>Contrase&ntilde;a</td>
		                    <td><input name="Contra" id="Contra" type="password"></td>
		                  </tr>
			            <tr>
			              <td>Fecha de nacimiento</td>
		                    <td><input name="Nacimiento" id="Nacimiento" type="date" min="1950-01-01" max=<? echo date("Y-m-d"); ?> ></td>
		                  </tr>
			            <tr>
			              <td><input type="radio" name="Tipo" id="Alumno" value="Alumno" checked> Alumno</td>
		                  <td><input type="radio" name="Tipo" id="Padre" value="Padre"> Padre de Familia</td>								
		                  </tr>
			            <tr>
			              <td colspan="2">
			                <button type="submit" class="reg">Registrarse</button>						    
			              </td>
		                  </tr>
		              </form>
	                  </table>
                    </ul>
		      </li>
			</ul>
		</nav>
	</header>
							
	<section id="seccion">
<br><?php
		
if (isset($_GET["s"])){$ses = $_GET["s"];} else { $ses = 3;}
if (isset($_GET["r"])){$reg = $_GET["r"];} else { $reg = 3;}
								
if($ses==0){
	echo "<div class='alerta alerta-error'>Usuario o contrase&ntilde;a incorrectos</div>";
}	
if($ses==2){
	echo "<div class='alerta alerta-advertencia'>Debes escribir una contrase&ntilde;a</div>";
}
if($reg==0){
	echo "<div class='alerta alerta-advertencia'>Hay campos vac&iacute;os</div>";
}
if($reg==2){
	echo "<div class='alerta alerta-error'>El correo o usuario ya existe</div>";
}		
?>
		<article>
			<header>
				
				<h1 class="tituloportada">Wisdom</h1>
				<center><img src="portada.gif" width="90%" ></center>
			</header>
			<div class="contenido">
				


</div>
		</article>
	</section>
	
	
	<div class="a"></div>
	
	<footer id="pie-de-pagina"><p>&copy; 2018 Wisdom</p></footer>
</body>
</html>