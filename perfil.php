<? require("librerias/libreriaprincipal.php"); $datos=cabecera("Perfil"); $usuario=$datos[0]; $cuenta=$datos[1]; $ruta_fotoperfil=$datos[2]; ?>				
				<center><table><tr>
				<td width="50%">
				<center><p></p><img src="<? echo "perfil/".$ruta_fotoperfil ?>" width="100px" height="100px" style="vertical-align: middle; border-radius: 20%"></center>
				<form action="actualizar_perfil.php?foto=1" enctype="multipart/form-data" method="post">
						<p></p>
						<center><input id="fotoperfil" name="fotoperfil" type="file" required></center>
						<div  class="tabla_crear"><input type="submit" value="Cambiar foto de perfil"></div>
					</form>
					<form action="actualizar_perfil.php?contra" method="post">
						<table class="tabla_crear">
							<tr>
								<td colspan="2"><center><b>Cambiar contraseña</b></center></td>
							</tr>
							<tr>
								<td>Contraseña actual:</td>
								<td><input type="password" name="actual" required></td>
							</tr>
							<tr>
								<td>Nueva contraseña:</td>
								<td><input type="password" name="nueva" required></td>
							</tr>
							<tr>
								<td>Vuelve a escribir la contraseña:</td>
								<td><input type="password" name="confirma" required></td>
							</tr>
							<tr><td colspan="2"><center><input type="submit" value="Guardar"></center><p></p></td></tr>
						</table>
					</form>
				</td>
				<td width="50%">
					<?
						$usuario = $_SESSION['wisdom'];
						$progreso = mysql_query("SELECT * FROM progreso WHERE Usuario_Alumno = '$usuario'");
						$progreso_exist = mysql_num_rows($progreso);
						$padre="";
						$docente="";
						if($progreso_exist>0){
							$progreso = mysql_fetch_array($progreso);
							$padre=$progreso["Usuario_Padre"];
							$docente=$progreso["Usuario_Docente"];
						}
						$nombre = mysql_query("SELECT Nombre,Correo,Nacimiento,Zonahoraria FROM usuarios WHERE Usuario = '$usuario'");
						$nombrea = mysql_fetch_array($nombre);
						$nombre = $nombrea[0];
						$correo = $nombrea[1];
						$nacimiento = $nombrea[2];
						$zona = $nombrea[3];
					?>
					<form action="actualizar_perfil.php?datos" method="post">
						<table class="tabla_crear">
							<tr>
								<td colspan="2"><center><b>Modificar datos</b></center></td>
							</tr>
							<tr>
								<td>Usuario:</td>
								<td><input type="text" name="usuario" value="<?=$usuario?>" disabled required autocomplete="off"></td>
							</tr>
							<tr>
								<td>Nombre:</td>
								<td><input type="text" name="nombre" value="<?=$nombre?>" required autocomplete="off"></td>
							</tr>
							<tr>
								<td>E-mail:</td>
								<td><input type="text" name="correo" value="<?=$correo?>" required autocomplete="off"></td>
							</tr>
							<tr>
								<td>Fecha de nacimiento:</td>
								<td><input type="date" name="nacimiento" value="<?=$nacimiento?>" required min="1950-01-01" max=<? echo date("Y-m-d"); ?>  autocomplete="off"></td>
							</tr>
							<tr>
								<td>Padre de familia:</td>
								<td><input type="text" name="padre" value="<?=$padre?>" autocomplete="off"></td>
							</tr>
							<tr>
								<td>Docente:</td>
								<td><input type="text" name="docente" value="<?=$docente?>"  autocomplete="off"></td>
							</tr>
							<tr>
								<td>Zona horaria:</td>
								<td><input type="search" name="zonas" list="zonas" value="<?=$zona?>" required autocomplete="off"></td>
								<datalist id="zonas">
								<?
									$a=DateTimeZone::listIdentifiers();	
									$i=0;
									while($i<count($a)){
										echo "<option value=".$a[$i].">";
										$i++;
									}
								?>
								</datalist>
							</tr>
						
						<tr><td colspan="2"><center><input type="submit" value="Guardar"></center><p></p></td></tr>
					</form>
					
						</table>
				</td>
				</tr>
<? 
	
	if(isset($_GET["perfilguardado"])){ echo "<div class='alerta alerta-exito'>Foto de perfil actualizada. Puede tardar en aparecer</div>"; }
	if(isset($_GET["notipo"])){ echo "<div class='alerta alerta-advertencia'>Tipo inválido de archivo</div>"; }
	if(isset($_GET["actualizado"])){ echo "<div class='alerta alerta-exito'>Datos actualizados</div>"; }
	if(isset($_GET["contranocoincide"])){ echo "<div class='alerta alerta-advertencia'>Tu contraseña es incorrecta, rectifica</div>"; }
	if(isset($_GET["nocoinciden"])){ echo "<div class='alerta alerta-error'>Las contraseñas no coinciden, rectifica</div>"; }
	if(isset($_GET["contraguardada"])){ echo "<div class='alerta alerta-exito'>Contraseña modificada</div>"; }	
?>
				</table></center>
			</header>
		</article>
<? footer(); ?>