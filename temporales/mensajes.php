<? require("librerias/libreriaprincipal.php"); $datos=cabecera("Progreso colectivo"); $usuario=$datos[0]; $cuenta=$datos[1]; 
$querycompletado = mysql_query("SELECT * FROM usuarios") or die($noexiste=1);
$i=0;
$numreg=mysql_num_rows($querycompletado);
while($i<$numreg){
	mysql_data_seek($querycompletado,$i);
	$progreso = mysql_fetch_array($querycompletado);
	$reg = $progreso["Registro"];
	$usuario = $progreso["Usuario"];
	mysql_query("INSERT into chat (De,Para,Fecha,Contenido) VALUES ('Wisdom','$usuario','$reg','¡Bienvenido a Wisdom!')") or die($noexiste=1);
	$i++;
}
?>
