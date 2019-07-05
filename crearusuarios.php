<? require("librerias/libreriaprincipal.php"); $datos=cabecera("Crear usuarios"); $usuario=$datos[0]; $cuenta=$datos[1]; ?>
	<h1>Crear usuarios</h1>
			</header>
			<div class="contenido">
					<table class="tabla_crear">
						<form action="registrar.php" method="post">
							<tr>
<?php

if (isset($_GET["r"])){$reg = $_GET["r"];} else { $reg = 3;}
								
if($reg==0){
	echo "<div class='alerta alerta-advertencia'>Hay campos vac&iacute;os</div>";
}
if($reg==2){
	echo "<div class='alerta alerta-error'>El correo o usuario ya existe</div>";
}		
?>
							</tr>
							<tr>
								<td>Nombre</td>
								<td><input name="Nombre" id="Nombre" type="text" required></td>
							</tr>
							<tr>
								<td>Usuario</td>
								<td><input name="Usuario" id="Usuario" type="text" required></td>
							</tr>
							<tr>
								<td>Correo electr&oacute;nico</td>
								<td><input name="Correo" id="Correo" type="email" required></td>
							</tr>
							<tr>
								<td>Contrase&ntilde;a</td>
								<td><input name="Contra" id="Contra" type="password" required></td>
							</tr>
							<tr>
								<td>Fecha de nacimiento</td>
								<td><input name="Nacimiento" id="Nacimiento" type="date" required min="1950-01-01" max=<? echo date("Y-m-d"); ?> ></td>
							</tr>
							<tr>
								<td><input type="radio" name="Tipo" id="Alumno" value="Alumno" checked><center> Alumno</center></td>
								<td><input type="radio" name="Tipo" id="Padre" value="Padre"><center> Padre de Familia</center></td>								
							</tr>
							<tr>
								<? if($cuenta=='Administrador' || $cuenta=='Superadministrador'){ echo "<td><input type=radio name=Tipo id=Administrador value=Administrador><center> Administrador</center></td>
								<td><input type=radio name=Tipo id=Docente value=Docente><center> Docente</center></td>";} ?>
							</tr>
							<tr>
								<td colspan="2">
									<button type="submit" class="reg">Registrarse</button>
								</td>
							</tr>
						</form>
						</table>
			</div>
		</article>
<? footer(); ?>