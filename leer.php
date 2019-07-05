<? require("librerias/libreriaprincipal.php"); $datos=cabecera("Chat"); $usuario=$datos[0]; $cuenta=$datos[1];
	if(isset($_GET['Orden'])){$Orden=$_GET['Orden'];} else {$Orden=null;}
	$querytitulo = mysql_query("SELECT Titulo FROM contenido WHERE id='$Orden'") or die(mysql_error());
	$datatitulo = mysql_fetch_array($querytitulo); ?>

		<h1><? if($Orden==null){echo "Contenido";} else{echo $datatitulo['Titulo'];} ?></h1>
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
			
			echo "<a href=leer.php?Orden=$id><b>ECA ".$tema." - </b>".$titulo." (".$tipo.")</a><br>";
			$a++;
		}
		echo "<br></div>";
	}else{
		
		
		$querycontenido = mysql_query("SELECT * FROM contenido WHERE id='$Orden'") or die(mysql_error());
		$datacontenido = mysql_fetch_array($querycontenido);
		$imagen = $datacontenido['Imagen'];
		$contenido = $datacontenido['Contenido'];
		$contenidoarray = explode("\n",$contenido);
		$filas = $datacontenido['Filas'];
		$columnas = $datacontenido['Columnas'];
		$tabladatos = $datacontenido['Tabladatos'];
		$tipo = $datacontenido['Tipo'];
		$video = $datacontenido['Video'];
		$videoid = explode("=",$video);
		$preguntas = $datacontenido['Preguntas'];
		$preguntasarray = explode("+",$preguntas);
		$cuadrocompara = $datacontenido['Cuadrocompara'];
		$cuadrocomparaarray = explode("+",$cuadrocompara);
		$ideas = $datacontenido['Ideas'];
		$ideasarray = explode("+",$ideas);
		echo "<div class=actividades>";
		if(file_exists('contenido/'.$imagen)&&$imagen!=""){echo"<center><img src='contenido/$imagen' width=90%></center><br>";}
		if($contenido!=null){
			$a=0;
			while($a<count($contenidoarray)){
				echo $contenidoarray[$a];
				echo "<br>";
				$a++;
			}
		}
		if($filas!=0 && $columnas!=0){
			$a=0;
			$c=0;
			$datos=explode("+",$tabladatos);
			echo "<center><div class=leer><form action=guardarprogreso.php?resp=$Orden method=post><table><tr>";
			while($a<$filas){
				$b=0;
				echo "<p>";
				while($b<$columnas){
					if($tipo=="sopa"){echo "<td><input type='checkbox' id=$c name=$c ><label for=$c><center><b>$datos[$c]</b></center></label><td>";}
					if($tipo=="crucigrama"){
						echo "<td class=sopa>";
						if($datos[$c]!=""){echo "<input type=text id=$c name=$c>";} 
						echo "</td>";
					}
					$c++;
					$b++;
				}
				echo "</tr><tr>";
				$a++;
				$c=$a*10;
			}
			echo "</tr></table><br><button type=submit class=reg>Enviar</button></form></div></center>";
		}
		if($video!=null){echo "<center><iframe width=560 height=315 src=https://www.youtube.com/embed/".$videoid[1]." frameborder=0 allow='autoplay; encrypted-media' allowfullscreen></iframe></center>";}
		
		if($preguntas!="++++++++++" && $preguntas!=null){
			$n = count($preguntasarray);
			$a = 0;
			echo "<table>";
			while($a<$n){
				echo "<tr><td>".$preguntasarray[$a]."</td><td><input type=text></td></tr>";
				$a++;
			}
			echo "</table>";
		}
		if($cuadrocompara!="++++++++++++++++++++++" && $cuadrocompara!=null){
			$n = count($cuadrocomparaarray);
			$a = 2;
			echo "<table>";
			echo "<tr><td>".$cuadrocomparaarray[0]."</td><td>".$cuadrocomparaarray[1]."</td></tr>";
			while($a<$n){
				echo "<tr><td>".$cuadrocomparaarray[$a]."</td><td>".$cuadrocomparaarray[$a+1]."</td></tr>";
				$a=$a+2;
			}
			echo "</table>";
		}
		if($ideas!="++++++++++" && $ideas!=null){
			echo "";
		}
		if($tipo=="texto"||$tipo=="video"||$tipo=="comparativo"||$tipo=="mental"||$tipo=="conceptual"){
			$usuario = $_SESSION['wisdom'];
			$progreso_existe = mysql_query("SELECT * FROM progreso WHERE Usuario_Alumno = '$usuario'");
			$progreso_exist = mysql_num_rows($progreso_existe);
			$progreso_existe = mysql_fetch_array($progreso_existe);
			if($progreso_exist>0){
				$progreso = $progreso_existe["Progreso"];
				$progresoa = explode("+",$progreso);
				$i=0;
				$d=0;
				while($i<(count($progresoa)-1)){
					if($progresoa[$i]==$Orden){$d=1;}
					$i++;
				}
				if($d==0){
					$progreso = $progreso.$Orden."+";
					mysql_query("UPDATE progreso SET Progreso='$progreso' WHERE Usuario_Alumno='$usuario' ");
				}
			}
			else{
				$progreso = $progreso.$Orden."+";
				mysql_query("INSERT INTO progreso (Usuario_Alumno,Progreso) VALUES ('$usuario','$progreso')");
			}
		}
		echo "<br></div>";
	}
	?>
			</div>
		</article>
<? footer(); ?>