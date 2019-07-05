<? require("librerias/libreriaprincipal.php"); conectar();?>
<? require("librerias/libreriaproceso.php"); noCache();?>
<meta charset='utf-8'>
<link rel=stylesheet type='text/css' href=imprimir.css>
<link rel=icon type='image/png' href=/wisdom/logo.png>
<title>Reporte de progreso</title>		
<body>

<?
	if(isset($_GET['Usuario'])){} else {header("Location: index.php"); return 0;}
	$user =  $_GET['Usuario'];
	$queryusuario = mysql_query("SELECT * FROM usuarios WHERE Usuario = '$user'" ) or die(mysql_error());
	$rowusuario = mysql_fetch_array($queryusuario);
	$usuario = $rowusuario['Nombre'];
	$cuenta = $rowusuario['Cuenta'];
?>

	<table class="titulo">
		<tr><td><img src="logo.png" width="60px" class="logo"></td><td><h1>Reporte de progreso</h1></td></tr>
		<tr><td>&nbsp;</td><td></td><td class=usuario><b>Usuario:</b></td><td> <? echo $usuario; ?></td></tr>
		<tr><td>&nbsp;</td><td></td><td class=usuario><b>Tipo:</b></td><td> <? echo $cuenta; ?></td></tr>
		<tr><td>&nbsp;</td><td></td><td class=fecha><b>Fecha:</b></td><td> <? echo date("d/m/Y"); ?></td></tr>
	</table>

<?	
	$tamtemas = mysql_num_rows(mysql_query("SELECT id FROM contenido"));
	$querytemas = mysql_query("SELECT id FROM contenido order by tema asc");
	$i=0;
	$arraytemas = array();
	while($i<$tamtemas){
		mysql_data_seek($querytemas,$i);
		$array=mysql_fetch_array($querytemas);
		$arraytemas[$i]=$array[0];
		$i++;
	}
	
	$i=0;
	$a=0;
	$array = array();
	while($i<$tamtemas){
		if(isset($_POST[$arraytemas[$i]])){
			$array[$a]=$arraytemas[$i];
			$a++;
		}
		$i++;
	}
	$sesion= $user;
	$progreso = mysql_fetch_array(mysql_query("SELECT Progreso FROM progreso WHERE Usuario_Alumno = '$sesion'"));
	$progreso = $progreso[0];
	$progreso = explode("+",$progreso);
	$tamprogreso = count($progreso);
?>
	<p>&nbsp;</p><p>&nbsp;</p>
		<center><table>
			<tr><td><b>Tema</b></td><td><b>¿Completado?</b></td></tr>
			<?
			$i=0;
			$tamtemas=count($array);
			$completado=0;
			$pendiente=0;
			while($tamtemas>$i){
				$a=0;
				$hecho=false;
				while($a<$tamprogreso){
					if($progreso[$a]==$array[$i]){
						$hecho=true;
					}
					$a++;
				}
				$titulo = mysql_fetch_array(mysql_query("SELECT Titulo, Tipo FROM contenido WHERE id = '$array[$i]'"));
				$titulo = $titulo[0];
				$tipo = $titulo[1];
				echo "<tr><td>".$titulo." (".$tipo.")"."</td><td><center>"; if($hecho){echo "Completado"; $completado++;} else {echo "Pendiente"; $pendiente++;} echo "</center></td></tr>";
				$i++;
			}
			$total=$pendiente+$completado;
			if($total>0){$porcentaje=round(($completado/$total)*100,2);} else {$porcentaje=0;}
			?>
		</table></center>
		<p>&nbsp;</p>
		<table align="right" style="padding-right: 40px;">
			<tr>
				<td><b>Ejercicios resueltos:</b></td><td align="center"><?=$completado?></td>
			</tr>
			<tr>
				<td><b>Ejercicios totales:</b></td><td align="center"><?=$total?></td>
			</tr>
			<tr>
				<td><b>Porcentaje completado:</b></td><td align="center"><?=$porcentaje?>%</td>
			</tr>
		</table>
	<script>window.print();</script>
</body>