<? require("librerias/libreriaprincipal.php"); $datos=cabecera("Editar contenido"); $usuario=$datos[0]; $cuenta=$datos[1];	if(isset($_GET['Orden'])){$Orden=$_GET['Orden'];} else {$Orden=null;}
	if($cuenta=='Superadministrador' || $cuenta=='Administrador' || $cuenta=='Docente'){}else{header("Location:index.php");}
	$querytitulo = mysql_query("SELECT Titulo FROM contenido WHERE id='$Orden'") or die(mysql_error());
	$datatitulo = mysql_fetch_array($querytitulo); ?>
			<header>
				<h1><? if($Orden==null){echo "Contenido";} else{echo "Editar";} ?></h1>
			</header>
			<div class="contenido">
	<?
	if($Orden==null){
		echo "<div class=indice>";
		$querycontenido = mysql_query("SELECT * FROM contenido order by tema asc") or die(mysql_error());
		$a = 0;
		$b = mysql_num_rows($querycontenido);
		$c = 1;
		$d = 0;
		while ($a<$b){
			if ($d == 0){
				$d++;
				echo "<h2> Unidad $c </h2>";
				$e = mysql_num_rows(mysql_query("SELECT Unidad FROM contenido where Unidad=$c"));
			}else{$d++;}
			if ($d == $e){$c++;$d=0;}
			$contenido=mysql_fetch_array($querycontenido);
			$tema = $contenido['Tema'];
			$titulo = $contenido['Titulo'];
			$id = $contenido['id'];
			$tipo = $contenido['Tipo'];
			
			echo "<a href=editar.php?Orden=$id><b>ECA ".$tema." - </b>".$titulo." (".$tipo.")</a><a href=elimina_contenido.php?Orden=$id><img src=elimina.png width=20px style='float:right; margin-right: 110px;'  onclick='return confirm('Se eliminará el contenido seleccionado. ¿Desea continuar?');'></a><br>";
			$a++;
		}
		echo "</div>";
		echo "<br><br>";
	}else{
		$querycontenido = mysql_query("SELECT * FROM contenido WHERE id='$Orden'") or die(mysql_error());
		$datacontenido = mysql_fetch_array($querycontenido);
		$unidad = $datacontenido['Unidad'];
		$tema = $datacontenido['Tema'];
		$titulo = $datacontenido['Titulo'];
		$imagen = $datacontenido['Imagen'];
		$contenido = $datacontenido['Contenido'];
		$contenidoarray = explode("\n",$contenido);
		$filas = $datacontenido['Filas'];
		$columnas = $datacontenido['Columnas'];
		$tabladatos = $datacontenido['Tabladatos'];
		$tabladatosarray = explode("+",$tabladatos);
		$tablaresultados = $datacontenido['Tablaresultados'];
		$tablaresultadosarray = explode("+",$tablaresultados);
		$tipo = $datacontenido['Tipo'];
		$video = $datacontenido['Video'];
		$videoid = explode("=",$video);
		$preguntas = $datacontenido['Preguntas'];
		$preguntasarray = explode("+",$preguntas);
		$cuadrocompara = $datacontenido['Cuadrocompara'];
		$cuadrocomparaarray = explode("+",$cuadrocompara);
		$ideas = $datacontenido['Ideas'];
		$ideasarray = explode("+",$ideas);
	if($tipo!=null){
	echo "<form action=editar_contenido.php method=post class=tabla_crear enctype=multipart/form-data>";
	echo "<input type=hidden name=Tipo value=$tipo>";
	echo "<input type=hidden name=id value=$Orden>";
	echo"<table>";
								
	echo "<tr><td>Lugar del men&uacute;:</td><td><input type=number id=Unidad name=Unidad placeholder=Unidad class=dividido value=".$unidad." required><input type=number id=Tema name=Tema placeholder=Tema class=dividido value=".$tema." required></td></tr>
	<tr><td>Titulo:</td><td><textarea id=Titulo name=Titulo required>$titulo</textarea></td></tr>";
								
	if($datacontenido['Tipo']=='sopa' || $datacontenido['Tipo']=='crucigrama'){ echo "<tr><td>Tamaño:</td><td><input type=number id=Filas name=Filas placeholder=Filas class=dividido value=".$filas." required><input type=number id=Columnas name=Columnas placeholder=Columnas class=dividido value=".$columnas." required></td></tr>"; }
	if($datacontenido['Tipo']=="texto" || $datacontenido['Tipo']=="cuestionario"){echo"<tr><td>Imagen:</td><td><input type=file id=Imagen name=Imagen></td></tr>";}
	if($datacontenido['Tipo']!=""){echo"<tr><td>Contenido:</td><td><textarea id=Contenido name=Contenido required>$contenido</textarea></td></tr>";}
	if($datacontenido['Tipo']=="sopa" || $datacontenido['Tipo']=="crucigrama"){echo"<tr><td>Tabla:</td><td>";
			$a=0; while($a<10){echo"<input type=text id=$a name=$a maxlenght='1' class=sopa value=$tabladatosarray[$a]>"; $a++;}
			$a=10; while($a<20){echo"<input type=text id=$a name=$a maxlenght='1' class=sopa value=$tabladatosarray[$a]>"; $a++;}
			$a=20; while($a<30){echo"<input type=text id=$a name=$a maxlenght='1' class=sopa value=$tabladatosarray[$a]>"; $a++;}
			$a=30; while($a<40){echo"<input type=text id=$a name=$a maxlenght='1' class=sopa value=$tabladatosarray[$a]>"; $a++;}
			$a=40; while($a<50){echo"<input type=text id=$a name=$a maxlenght='1' class=sopa value=$tabladatosarray[$a]>"; $a++;}
			$a=50; while($a<60){echo"<input type=text id=$a name=$a maxlenght='1' class=sopa value=$tabladatosarray[$a]>"; $a++;}
			$a=60; while($a<70){echo"<input type=text id=$a name=$a maxlenght='1' class=sopa value=$tabladatosarray[$a]>"; $a++;}
			$a=70; while($a<80){echo"<input type=text id=$a name=$a maxlenght='1' class=sopa value=$tabladatosarray[$a]>"; $a++;}
			$a=80; while($a<90){echo"<input type=text id=$a name=$a maxlenght='1' class=sopa value=$tabladatosarray[$a]>"; $a++;}
			$a=90; while($a<100){echo"<input type=text id=$a name=$a maxlenght='1' class=sopa value=$tabladatosarray[$a]>"; $a++;}
	echo"</td></tr>";}
	if($datacontenido['Tipo']=="sopa"){echo"<tr></tr><tr></tr><tr></tr><tr><td>Respuestas:</td><td>";
			$a=0; while($a<10){echo"<input type=text id=r$a name=r$a maxlenght='1' class=sopa value=$tablaresultadosarray[$a]>"; $a++;}
			$a=10; while($a<20){echo"<input type=text id=r$a name=r$a maxlenght='1' class=sopa value=$tablaresultadosarray[$a]>"; $a++;}
			$a=20; while($a<30){echo"<input type=text id=r$a name=r$a maxlenght='1' class=sopa value=$tablaresultadosarray[$a]>"; $a++;}
			$a=30; while($a<40){echo"<input type=text id=r$a name=r$a maxlenght='1' class=sopa value=$tablaresultadosarray[$a]>"; $a++;}
			$a=40; while($a<50){echo"<input type=text id=r$a name=r$a maxlenght='1' class=sopa value=$tablaresultadosarray[$a]>"; $a++;}
			$a=50; while($a<60){echo"<input type=text id=r$a name=r$a maxlenght='1' class=sopa value=$tablaresultadosarray[$a]>"; $a++;}
			$a=60; while($a<70){echo"<input type=text id=r$a name=r$a maxlenght='1' class=sopa value=$tablaresultadosarray[$a]>"; $a++;}
			$a=70; while($a<80){echo"<input type=text id=r$a name=r$a maxlenght='1' class=sopa value=$tablaresultadosarray[$a]>"; $a++;}
			$a=80; while($a<90){echo"<input type=text id=r$a name=r$a maxlenght='1' class=sopa value=$tablaresultadosarray[$a]>"; $a++;}
			$a=90; while($a<100){echo"<input type=text id=r$a name=r$a maxlenght='1' class=sopa value=$tablaresultadosarray[$a]>"; $a++;}
	echo"</td></tr>";}						
	if($datacontenido['Tipo']=="video"){echo"<tr><td>URL del Video:</td><td><input type=text id=Video name=Video value=$video required></td></tr>";}
	if($datacontenido['Tipo']=="cuestionario"){echo"<tr></tr><tr></tr><tr></tr><tr><td>Preguntas:</td><td>";
			$a=0; while($a<10){echo"<input type=text id=p$a name=p$a value=$preguntasarray[$a] required>"; $a++;}
	echo"</td></tr>";}
	if($datacontenido['Tipo']=="conceptual" || $datacontenido['Tipo']=="mental"){echo"<tr></tr><tr></tr><tr></tr><tr><td>Ideas del mapa:</td><td>";
			$a=0; while($a<10){echo"<input type=text id=i$a name=i$a value=$ideasarray[$a] required>"; $a++;}
	echo"</td></tr>";}
	if($datacontenido['Tipo']=="comparativo"){echo"<tr></tr><tr></tr><tr></tr><tr><td>Cuadro comparativo:</td><td>";
			echo "<input type=text id=ti name=ti class=dividido placeholder=Titulo value=$cuadrocomparaarray[1] required><input type=text id=td name=td class=dividido placeholder=Titulo $cuadrocomparaarray[2] required>";
			$a=0; $b=3; while($a<10){echo"<input type=text id=ii$a name=ii$a class=dividido placeholder value=$cuadrocomparaarray[$b] required>"; $b++; echo "<input type=text id=id$a name=id$a class=dividido placeholder value=$cuadrocomparaarray[$b] required>"; $a++;}
	echo"</td></tr>";}
							
	echo "<tr><td><button type=submit class=reg>Guardar</button></td></tr>
	</table>
	</form>";
							
						}
	}
	?>
			</div>
		</article>
<? footer(); ?>