<? require("librerias/libreriaprincipal.php"); $datos=cabecera("Imprime progreso"); $usuario=$datos[0]; $cuenta=$datos[1]; ?>		
<? require("librerias/libreriaproceso.php"); ?>	
	<h1>Por favor, selecciona los temas a imprimir</h1>
	
			</header>
				<?
		if(isset($_GET['Usuario'])){} else {header("Location: index.php"); return 0;}
		$user=$_GET['Usuario'];
		echo "<div class=indice><form action=imprime_progreso.php?Usuario=$user method=post>";
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
			
			echo "<a><b>ECA ".$tema." - </b>".$titulo." (".$tipo.")</a><input type=checkbox width=20px style='float:right; margin-right: 110px;' name=$id><br>";
			$a++;
		}
		?><div style="text-align: right; margin-right: 100px;"><button type="submit"><img src="imprimir.png" width="40px"></button></div> <?
		echo "</form></div>";
		echo "<br><br>";
				?>	
			</div><br>
		</article>
<? footer(); ?>