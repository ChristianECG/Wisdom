<? require("librerias/libreriaprincipal.php"); $datos=cabecera("Inicio"); $usuario=$datos[0]; $cuenta=$datos[1]; ?>
<? require("librerias/chats.php"); ?>		
				<h1>Men&uacute;</h1>
			</header>
			<div class="contenido">
				<center>
					<table class="menu">
						<tr align="center">
							<?
								$posicion = 0;
						 		$css = 0;
								if ($cuenta == 'Superadministrador'){
									$posicion += 1;$css += 1;
									echo("<td><a href=/phpmyadmin/sql.php?db=wisdom class=boton$css target='_blank'><button>Base de datos</button></a></td>");
									if($posicion == 2){echo "</tr><tr align=center>";$posicion=0;};if($css == 5){$css=0;};
								}
						 		if ($cuenta == 'Superadministrador' || $cuenta == 'Administrador'){
									$posicion += 1;$css += 1;
									echo("<td><a href=crearusuarios.php class=boton$css><button>Crear usuarios</button></a></td>");
									if($posicion == 2){echo "</tr><tr align=center>";$posicion=0;};if($css == 5){$css=0;};
								}
						 		if ($cuenta == 'Superadministrador' || $cuenta == 'Administrador' || $cuenta == 'Docente'){
									$posicion += 1;$css += 1;
									echo("<td><a href=crear.php class=boton$css><button>Crear contenido</button></a></td>");
									if($posicion == 2){echo "</tr><tr align=center>";$posicion=0;};if($css == 5){$css=0;};
								}
						 		if ($cuenta != null){
									$posicion += 1;$css += 1;
									echo("<td><a href=leer.php class=boton$css><button>Ver contenido</button></a></td>");
									if($posicion == 2){echo "</tr><tr align=center>";$posicion=0;};if($css == 5){$css=0;};
								}
						 		if ($cuenta == 'Superadministrador' || $cuenta == 'Administrador' || $cuenta == 'Docente'){
									$posicion += 1;$css += 1;
									echo("<td><a href=editar.php class=boton$css><button>Editar contenido</button></a></td>");
									if($posicion == 2){echo "</tr><tr align=center>";$posicion=0;};if($css == 5){$css=0;};
								}
						 		if ($cuenta != null){
									$posicion += 1;$css += 1;
									echo("<td><a href=progreso.php class=boton$css><button>Ver progreso</button></a></td>");
									if($posicion == 2){echo "</tr><tr align=center>";$posicion=0;};if($css == 5){$css=0;};
								}
								if ($cuenta == 'Alumno'){
									$posicion += 1;$css += 1;
									$user = $_SESSION['wisdom'];
									echo("<td><a href=imprimeprogreso.php?Usuario=$user class=boton$css><button>Imprimir progreso</button></a></td>");
									if($posicion == 2){echo "</tr><tr align=center>";$posicion=0;};if($css == 5){$css=0;};
								}
						 		if ($cuenta != null){
									$posicion += 1;$css += 1;
									$chats=mensajespendientescolect();
									echo("<td><a href=chat.php class=boton$css><button>Chat $chats</button></a></td>");
									if($posicion == 2){echo "</tr><tr align=center>";$posicion=0;};if($css == 5){$css=0;};
								}
							?>
						</tr>
					</table>
				</center>
				
			</div>
		</article>
<? footer(); ?>