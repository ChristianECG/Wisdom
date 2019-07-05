<? require("librerias/libreriaprincipal.php"); $datos=cabecera("Progreso"); $usuario=$datos[0]; $cuenta=$datos[1]; ?>		
<? require("librerias/libreriaproceso.php"); ?>	
	<h1>Progreso</h1>
	<? 
	$querycontenido = mysql_query("SELECT id FROM contenido") or die(mysql_error());
	$total = mysql_num_rows($querycontenido);
	if($cuenta=='Alumno'){$Alumno = $_SESSION['wisdom'];}
	else if($cuenta=='Padre'){
		$queryalumno = mysql_query("SELECT Usuario_Alumno FROM progreso WHERE Usuario_Padre = '$_SESSION[wisdom]'" ) or die(mysql_error());
		$rowalumno= mysql_fetch_array($queryalumno);
		$Alumno = $rowalumno['Usuario_Alumno'];
	}
	else if (isset($_GET['Usu'])){$Alumno=$_GET['Usu'];}
	else {$Alumno = $_SESSION['wisdom']; echo "<head><meta HTTP-EQUIV='Refresh' CONTENT='0; URL=progresocolect.php'></head>"; return 0;}
	
	if($Alumno==null){echo "<head><meta HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php'></head>"; return 0;}
	$querycompletado = mysql_query("SELECT Progreso FROM progreso WHERE Usuario_Alumno='$Alumno'") or die($noexiste=1);
	if(isset($noexiste)){
		$porcentaje=0;
		$progreso=null;
	}
	else{
	$progreso = mysql_fetch_array($querycompletado);
	$progreso = $progreso['Progreso'];
	$progreso = explode("+",$progreso);
	$progresonum = count($progreso)-1;
	$porcentaje=round(($progresonum/$total)*100,2);
	$progreso = ordenaarray($progreso);
	}
	?>
 <div class="porcentaje">
 	<? $style="style='width:".$porcentaje."%'";
		echo "<div class=barraporcentaje $style>";
	 	if($porcentaje>=15){ ?>
	 		<div class="textoporcentaje"><? echo $porcentaje; ?>% completado</div>
	 	<? } ?>
  	</div>
  	<? if($porcentaje<15){ ?>
	 		<div class="barraporcentaje textoporcentaje2" style="color: black;"><? echo $porcentaje; ?>% completado</div>
	 	<? } ?>
</div>
			</header><center><a href='imprimeprogreso.php?Usuario=<?=$Alumno?>'><img src=imprimir.png width=25px></a></center>
			<div class="contenido indice">
			<?
				if($cuenta=="Alumno"){echo "<h2>Has completado hasta el momento:</h2>";}
				else if($cuenta=="Docente"){echo "<h2>El alumno $Alumno ha completado hasta el momento:</h2>";}
				else {echo "<h2>El usuario $Alumno ha completado hasta el momento:</h2>";}
				
			?>
			<div class=a>	
			<?
				$i=0;
				while($i<$progresonum){
					$querycontenido = mysql_query("SELECT * FROM contenido WHERE id=$progreso[$i]") or die(mysql_error());
					$data = mysql_fetch_array($querycontenido);
					echo "<b>ECA ".$data["Tema"]." - </b>".$data["Titulo"]." (".$data["Tipo"].")<br>";
					$i++;
				}
			?>
				</div>	
			</div><br>
		</article>
<? footer(); ?>