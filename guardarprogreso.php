<?
	session_start();
	mysql_connect("localhost", "root", "" ) or die(mysql_error());
	mysql_select_db("wisdom" ) or die(mysql_error());
	mysql_query("SET NAMES 'utf8'");
	echo "<link rel=stylesheet type='text/css' href=loader.css><div class=loader id=loader>loading...</div>";
	$Orden = $_GET['resp'];
	$respuestasusuario = "";
	$i=0;
	while($i<100){
		if(isset($_POST[$i])){
			$respuestasusuario = $respuestasusuario.$_POST[$i]."+";
		}
		else {
			$respuestasusuario = $respuestasusuario."+";
		}
		$i++;
	}
	$usuario = $_SESSION['wisdom'];
	$progreso_existe = mysql_query("SELECT * FROM progreso WHERE Usuario_Alumno = '$usuario'");
	$progreso_exist = mysql_num_rows($progreso_existe);
	$progreso_existe = mysql_fetch_array($progreso_existe);
	$respuestas = mysql_query("SELECT Tablaresultados FROM contenido WHERE id = $Orden");
	$respuestas = mysql_fetch_array($respuestas);
	$respuestas = $respuestas[0];
	$respuestas = explode("+",$respuestas);
	$i=0;
	$respuestasc = "";
	$iresp = $respuestas[0];
	if($iresp=="+"){
		$respuestasc = $respuestasc."+";
	}
	while($i<100){
		if($respuestas[$i]==""){
			$respuestasc = $respuestasc."+";
		}
		else{
			$respuestasc = $respuestasc."on+";
		}
		$i++;
	}
	$progreso="";
	if($respuestasc==$respuestasusuario){
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
			$res = 1;
		}
	}
	else {
		$res = 0;
	}
	echo "<html><head></head><meta HTTP-EQUIV='Refresh' CONTENT='0; URL=leer.php?Orden=$Orden&&Res=$res'></html>";
?>