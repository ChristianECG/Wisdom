<? require("librerias/libreriaprincipal.php"); $datos=cabecera("Crear contenido"); $usuario=$datos[0]; $cuenta=$datos[1]; ?>
	
	<?
	if(isset($_GET["g"])){
		if($_GET["g"]=="true"){
			echo "<br><div class='alerta alerta-exito'>Contenido registrado correctamente</div>";
		}
	}	
	?>
				<h1>Crear contenido</h1>
			</header>
			<div class="contenido">
	
	<?
	if(isset($_GET['tipo'])){
	echo "<form action=crear_contenido.php method=post class=tabla_crear enctype=multipart/form-data>";
	echo "<input type=hidden name=Tipo value=$_GET[tipo]>";
	echo"<table>";
								
	echo"<tr><td>Lugar del men&uacute;:</td><td><input type=number id=Unidad name=Unidad placeholder=Unidad class=dividido required><input type=number id=Tema name=Tema placeholder=Tema class=dividido required></td></tr>
	<tr><td>Titulo:</td><td><input type=text id=Titulo name=Titulo required></td></tr>";
	if($_GET['tipo']=="sopa" || $_GET['tipo']=="crucigrama"){echo"<tr><td>Tamaño:</td><td><input type=number id=Filas name=Filas placeholder=Filas class=dividido><input type=number id=Columnas name=Columnas placeholder=Columnas class=dividido></td></tr>";}
	if($_GET['tipo']=="texto" || $_GET['tipo']=="cuestionario"){echo"<tr><td>Imagen:</td><td><input type=file id=Imagen name=Imagen></td></tr>";}
	if($_GET['tipo']=="texto"){echo"<tr><td>Contenido:</td><td><textarea id=Contenido name=Contenido required></textarea></td></tr>";}
	if($_GET['tipo']=="sopa" || $_GET['tipo']=="crucigrama"){echo"<tr><td>Tabla:</td><td>";
			$a=0; while($a<10){echo"<input type=text id=$a name=$a maxlenght='1' class=sopa>"; $a++;}
			$a=10; while($a<20){echo"<input type=text id=$a name=$a maxlenght='1' class=sopa>"; $a++;}
			$a=20; while($a<30){echo"<input type=text id=$a name=$a maxlenght='1' class=sopa>"; $a++;}
			$a=30; while($a<40){echo"<input type=text id=$a name=$a maxlenght='1' class=sopa>"; $a++;}
			$a=40; while($a<50){echo"<input type=text id=$a name=$a maxlenght='1' class=sopa>"; $a++;}
			$a=50; while($a<60){echo"<input type=text id=$a name=$a maxlenght='1' class=sopa>"; $a++;}
			$a=60; while($a<70){echo"<input type=text id=$a name=$a maxlenght='1' class=sopa>"; $a++;}
			$a=70; while($a<80){echo"<input type=text id=$a name=$a maxlenght='1' class=sopa>"; $a++;}
			$a=80; while($a<90){echo"<input type=text id=$a name=$a maxlenght='1' class=sopa>"; $a++;}
			$a=90; while($a<100){echo"<input type=text id=$a name=$a maxlenght='1' class=sopa>"; $a++;}
	echo"</td></tr>";}
	if($_GET['tipo']=="sopa"){echo"<tr></tr><tr></tr><tr></tr><tr><td>Respuestas:</td><td>";
			$a=0; while($a<10){echo"<input type=text id=r$a name=r$a maxlenght='1' class=sopa>"; $a++;}
			$a=10; while($a<20){echo"<input type=text id=r$a name=r$a maxlenght='1' class=sopa>"; $a++;}
			$a=20; while($a<30){echo"<input type=text id=r$a name=r$a maxlenght='1' class=sopa>"; $a++;}
			$a=30; while($a<40){echo"<input type=text id=r$a name=r$a maxlenght='1' class=sopa>"; $a++;}
			$a=40; while($a<50){echo"<input type=text id=r$a name=r$a maxlenght='1' class=sopa>"; $a++;}
			$a=50; while($a<60){echo"<input type=text id=r$a name=r$a maxlenght='1' class=sopa>"; $a++;}
			$a=60; while($a<70){echo"<input type=text id=r$a name=r$a maxlenght='1' class=sopa>"; $a++;}
			$a=70; while($a<80){echo"<input type=text id=r$a name=r$a maxlenght='1' class=sopa>"; $a++;}
			$a=80; while($a<90){echo"<input type=text id=r$a name=r$a maxlenght='1' class=sopa>"; $a++;}
			$a=90; while($a<100){echo"<input type=text id=r$a name=r$a maxlenght='1' class=sopa>"; $a++;}
	echo"</td></tr>";}						
	if($_GET['tipo']=="sopa" || $_GET['tipo']=="crucigrama"){echo"<tr><td>Descripci&oacute;n:</td><td><textarea id=Contenido name=Contenido required></textarea></td></tr>";}
	if($_GET['tipo']=="video"){echo"<tr><td>URL del Video:</td><td><input type=text id=Video name=Video required></td></tr>";}
	if($_GET['tipo']=="cuestionario"){echo"<tr></tr><tr></tr><tr></tr><tr><td>Preguntas:</td><td>";
			$a=0; while($a<10){echo"<input type=text id=p$a name=p$a>"; $a++;}
	echo"</td></tr>";}
	if($_GET['tipo']=="conceptual" || $_GET['tipo']=="mental"){echo"<tr></tr><tr></tr><tr></tr><tr><td>Ideas del mapa:</td><td>";
			$a=0; while($a<10){echo"<input type=text id=i$a name=i$a>"; $a++;}
	echo"</td></tr>";}
	if($_GET['tipo']=="comparativo"){echo"<tr></tr><tr></tr><tr></tr><tr><td>Cuadro comparativo:</td><td>";
			echo "<input type=text id=ti name=ti class=dividido placeholder=Titulo required><input type=text id=td name=td class=dividido placeholder=Titulo required>";
			$a=0; while($a<10){echo"<input type=text id=ii$a name=ii$a class=dividido><input type=text id=id$a name=id$a class=dividido>"; $a++;}
	echo"</td></tr>";}
							
	echo "<tr><td><button type=submit class=reg>Guardar</button></td></tr>
	</table>
	</form>";
							
						}
						else {echo("
<center><table><tr>
	<td><center><a href=crear.php?tipo=texto class=boton1><button>Texto</button></a></center</td>
	<td><center><a href=crear.php?tipo=video class=boton2><button>Video</button></a></center</td>
	<td><center><a href=crear.php?tipo=mental class=boton4><button>Mapa mental</button></a</center></td></tr>
	<tr><td><center><a href=crear.php?tipo=comparativo class=boton5><button>Cuadro comparativo</button></a></center></td>
	<td><center><a href=crear.php?tipo=cuestionario class=boton1><button>Cuestionario</button</a></center></td>
	<td><center><a href=crear.php?tipo=sopa class=boton2><button>Sopa de letras</button</a></center></td></tr>
	<tr><td><center><a href=crear.php?tipo=conceptual class=boton3><button>Mapa conceptual</button</a></center></td>
	<td><center><a href=crear.php?tipo=crucigrama class=boton3><button>Crucigrama</button></a</center></td></tr>
</tr></table></center>
						");}
					?>	
			</div>
		</article>
<? footer(); ?>