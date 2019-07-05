<? require("librerias/libreriaprincipal.php"); $datos=cabecera("Progreso colectivo"); $usuario=$datos[0]; $cuenta=$datos[1]; ?>
<? $permisos=array("Superadministrador","Administrador","Docente"); permisos($cuenta,$permisos); ?>
				<h1>Progreso colectivo</h1>
				<?
					if($cuenta=='Docente'){
						$nombre=$_SESSION['wisdom'];
						$querycompletado = mysql_query("SELECT * FROM progreso WHERE Usuario_Docente='$nombre' order by Usuario_Alumno") or die($noexiste=1);
					}
					else{
						$querycompletado = mysql_query("SELECT * FROM progreso order by Usuario_Alumno") or die($noexiste=1);
					}
					$numreg=mysql_num_rows($querycompletado);
					if($numreg<1 || isset($noexiste)){
						echo "<div class='contenido indice a'>Lo sentimos, pero al parecer no puedes ver el progreso de ningún usuario</div>";
					}
					else{
						$a=0;
						echo "<table class=tabla_crear><tr><td><b><center>No.</center></b></td><td><b><center>Usuario</center></b></td><td width=300px><b><center>Progreso</center></b></td><td><center></center></td></tr>";
						while($a<$numreg){
							$querycontenido = mysql_query("SELECT id FROM contenido") or die(mysql_error());
							$total = mysql_num_rows($querycontenido);
							mysql_data_seek($querycompletado,$a);
							$progreso = mysql_fetch_array($querycompletado);
							$progresodata = $progreso;
							$a++;
							$progreso = $progreso['Progreso'];
							$progreso = explode("+",$progreso);
							$progresonum = count($progreso)-1;
							$porcentaje=round(($progresonum/$total)*100,2);
							?>
							<tr>
								<td><? echo "<center><b>".$a."</b></center>"; ?></td>
								<td><b><a href=progreso.php?Usu=<?=$progresodata['Usuario_Alumno']?> style="text-decoration: inherit; color: inherit;"><? echo $progresodata['Usuario_Alumno']; ?></a></b></td>
								<td>
								
									<div class="porcentaje">
									<? $style="style='width:".$porcentaje."%'";
										echo "<div class=barraporcentaje $style></div>";
									?>
									</div>
								</td>
								<td><div class="textoporcentaje"><center><? echo $porcentaje; ?>% completado</center></div></td>
							</tr>
							<?
							}
						echo "</table>";
						}
				?><br>
		</article>
<? footer(); ?>