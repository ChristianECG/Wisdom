<?php
function enviarmensaje(){
	$de = $_SESSION['wisdom'];
	$zona=mysql_fetch_array(mysql_query("SELECT Zonahoraria FROM usuarios WHERE Usuario='$de'"));
	$zona=$zona[0];
	date_default_timezone_set($zona);
	$para = $_POST["para"];
	$mensaje = $_POST["mensaje"];
	$fecha = date("d/m/Y h:i A");
	mysql_query("INSERT INTO chat (De, Para, Fecha, Contenido) VALUES('$de','$para','$fecha','$mensaje')");
	echo "<html><head></head><meta HTTP-EQUIV='Refresh' CONTENT='0; URL=chat.php?t=$para'></html>";
}

function emojis($mensaje){
	
	$mensaje = str_replace("@[::001::]","<img src=emojis/001.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::002::]","<img src=emojis/002.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::003::]","<img src=emojis/003.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::004::]","<img src=emojis/004.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::005::]","<img src=emojis/005.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::006::]","<img src=emojis/006.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::007::]","<img src=emojis/007.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::008::]","<img src=emojis/008.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::009::]","<img src=emojis/009.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::010::]","<img src=emojis/010.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::011::]","<img src=emojis/011.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::012::]","<img src=emojis/012.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::013::]","<img src=emojis/013.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::014::]","<img src=emojis/014.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::015::]","<img src=emojis/015.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::016::]","<img src=emojis/016.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::017::]","<img src=emojis/017.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::018::]","<img src=emojis/018.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::019::]","<img src=emojis/019.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::020::]","<img src=emojis/020.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::021::]","<img src=emojis/021.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::022::]","<img src=emojis/022.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::023::]","<img src=emojis/023.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::024::]","<img src=emojis/024.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::025::]","<img src=emojis/025.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::026::]","<img src=emojis/026.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::027::]","<img src=emojis/027.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::028::]","<img src=emojis/028.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::029::]","<img src=emojis/029.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::030::]","<img src=emojis/030.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::031::]","<img src=emojis/031.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::032::]","<img src=emojis/032.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::033::]","<img src=emojis/033.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::034::]","<img src=emojis/034.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::035::]","<img src=emojis/035.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::036::]","<img src=emojis/036.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::037::]","<img src=emojis/037.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::038::]","<img src=emojis/038.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::039::]","<img src=emojis/039.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::040::]","<img src=emojis/040.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::041::]","<img src=emojis/041.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::042::]","<img src=emojis/042.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::043::]","<img src=emojis/043.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::044::]","<img src=emojis/044.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::045::]","<img src=emojis/045.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::046::]","<img src=emojis/046.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::047::]","<img src=emojis/047.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::048::]","<img src=emojis/048.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::049::]","<img src=emojis/049.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::050::]","<img src=emojis/050.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::051::]","<img src=emojis/051.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::052::]","<img src=emojis/052.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::053::]","<img src=emojis/053.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::054::]","<img src=emojis/054.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::055::]","<img src=emojis/055.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::056::]","<img src=emojis/056.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::057::]","<img src=emojis/057.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::058::]","<img src=emojis/058.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::059::]","<img src=emojis/059.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::060::]","<img src=emojis/060.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::061::]","<img src=emojis/061.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::062::]","<img src=emojis/062.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::063::]","<img src=emojis/063.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::064::]","<img src=emojis/064.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::065::]","<img src=emojis/065.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::066::]","<img src=emojis/066.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::067::]","<img src=emojis/067.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::068::]","<img src=emojis/068.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::069::]","<img src=emojis/069.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::070::]","<img src=emojis/070.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::071::]","<img src=emojis/071.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::072::]","<img src=emojis/072.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::073::]","<img src=emojis/073.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::074::]","<img src=emojis/074.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::075::]","<img src=emojis/075.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::076::]","<img src=emojis/076.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::077::]","<img src=emojis/077.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::078::]","<img src=emojis/078.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::079::]","<img src=emojis/079.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::080::]","<img src=emojis/080.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::081::]","<img src=emojis/081.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::082::]","<img src=emojis/082.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::083::]","<img src=emojis/083.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::084::]","<img src=emojis/084.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::085::]","<img src=emojis/085.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::086::]","<img src=emojis/086.png width=20px>",$mensaje);
	$mensaje = str_replace("@[::087::]","<img src=emojis/087.png width=20px>",$mensaje);
	
	$mensaje = str_replace(":)",    "<img src=emojis/001.png width=20px>",$mensaje);
	$mensaje = str_replace(":-)",   "<img src=emojis/001.png width=20px>",$mensaje);
	$mensaje = str_replace(":]",    "<img src=emojis/001.png width=20px>",$mensaje);
	$mensaje = str_replace("=)",    "<img src=emojis/001.png width=20px>",$mensaje);
	$mensaje = str_replace(";-)",   "<img src=emojis/002.png width=20px>",$mensaje);
	$mensaje = str_replace(";)",    "<img src=emojis/002.png width=20px>",$mensaje);
	$mensaje = str_replace(":-D",   "<img src=emojis/003.png width=20px>",$mensaje);
	$mensaje = str_replace(":D",    "<img src=emojis/003.png width=20px>",$mensaje);
	$mensaje = str_replace("=D",    "<img src=emojis/003.png width=20px>",$mensaje);
	$mensaje = str_replace(":-P",   "<img src=emojis/004.png width=20px>",$mensaje);
	$mensaje = str_replace(":P",    "<img src=emojis/004.png width=20px>",$mensaje);
	$mensaje = str_replace(":-p",   "<img src=emojis/004.png width=20px>",$mensaje);
	$mensaje = str_replace(":p",    "<img src=emojis/004.png width=20px>",$mensaje);
	$mensaje = str_replace("=P",    "<img src=emojis/004.png width=20px>",$mensaje);
	$mensaje = str_replace(":-*",   "<img src=emojis/005.png width=20px>",$mensaje);
	$mensaje = str_replace(":*",    "<img src=emojis/005.png width=20px>",$mensaje);
	$mensaje = str_replace("-_-",   "<img src=emojis/006.png width=20px>",$mensaje);
	$mensaje = str_replace(">:O",   "<img src=emojis/007.png width=20px>",$mensaje);
	$mensaje = str_replace(">:-O",  "<img src=emojis/007.png width=20px>",$mensaje);
	$mensaje = str_replace(">:o",   "<img src=emojis/007.png width=20px>",$mensaje);
	$mensaje = str_replace(">:-o",  "<img src=emojis/007.png width=20px>",$mensaje);
	$mensaje = str_replace("8-|",   "<img src=emojis/008.png width=20px>",$mensaje);
	$mensaje = str_replace("8|",    "<img src=emojis/008.png width=20px>",$mensaje);
	$mensaje = str_replace("B-|",   "<img src=emojis/008.png width=20px>",$mensaje);
	$mensaje = str_replace("B|",    "<img src=emojis/008.png width=20px>",$mensaje);
	$mensaje = str_replace("O:)",   "<img src=emojis/009.png width=20px>",$mensaje);
	$mensaje = str_replace("O:-)",  "<img src=emojis/009.png width=20px>",$mensaje);
	$mensaje = str_replace(":(",    "<img src=emojis/010.png width=20px>",$mensaje);
	$mensaje = str_replace(":-(",   "<img src=emojis/010.png width=20px>",$mensaje);
	$mensaje = str_replace(":[",    "<img src=emojis/010.png width=20px>",$mensaje);
	$mensaje = str_replace("=(",    "<img src=emojis/010.png width=20px>",$mensaje);
	$mensaje = str_replace(":O",    "<img src=emojis/011.png width=20px>",$mensaje);
	$mensaje = str_replace(":-O",   "<img src=emojis/011.png width=20px>",$mensaje);
	$mensaje = str_replace(":o",    "<img src=emojis/011.png width=20px>",$mensaje);
	$mensaje = str_replace(":-o",   "<img src=emojis/011.png width=20px>",$mensaje);
	$mensaje = str_replace(":'(",   "<img src=emojis/012.png width=20px>",$mensaje);
	$mensaje = str_replace(":/",    "<img src=emojis/013.png width=20px>",$mensaje);
	$mensaje = str_replace(":-/",   "<img src=emojis/013.png width=20px>",$mensaje);
	$mensaje = str_replace("3:)",   "<img src=emojis/014.png width=20px>",$mensaje);
	$mensaje = str_replace("3:-)",  "<img src=emojis/014.png width=20px>",$mensaje);
	$mensaje = str_replace("3:-(",  "<img src=emojis/015.png width=20px>",$mensaje);
	$mensaje = str_replace("3:-(",  "<img src=emojis/015.png width=20px>",$mensaje);
	$mensaje = str_replace(":poop:","<img src=emojis/016.png width=20px>",$mensaje);
	$mensaje = str_replace("(:",    "<img src=emojis/017.png width=20px>",$mensaje);
	$mensaje = str_replace("^_^",   "<img src=emojis/018.png width=20px>",$mensaje);
	$mensaje = str_replace(":|]",   "<img src=emojis/019.png width=20px>",$mensaje);
	$mensaje = str_replace("<3",    "<img src=emojis/074.png width=20px>",$mensaje);
	$mensaje = str_replace("</3",   "<img src=emojis/075.png width=20px>",$mensaje);
	$mensaje = str_replace("(y)",   "<img src=emojis/076.png width=20px>",$mensaje);
	$mensaje = str_replace(":3",    "<img src=emojis/087.png width=20px>",$mensaje);

	return($mensaje);
}

function mensajespendientes($usuario){
	$para=$_SESSION['wisdom'];
	$queryvisto=mysql_query("SELECT Visto FROM chat WHERE Para='$para' and De='$usuario'");
	$vistotam=mysql_num_rows($queryvisto);
	$i=0;
	$contador=0;
	while($i<$vistotam){
		mysql_data_seek($queryvisto,$i);
		$visto=mysql_fetch_array($queryvisto);
		if($visto[0]!="Si"){
			$contador++;
		}
		$i++;
	}
	if($contador>99){
		$contador=99;
	}
	if($contador<10){
		$html= "&nbsp;<div class='chats mensajespendientes'><b>&nbsp;$contador&nbsp;</b></div>";
	}
	if($contador>=10){
		$html= "&nbsp;<div class='chats mensajespendientes'><b>$contador</b></div>";
	}
	if($contador>0){
		return($html);
	}
}

function mensajespendientescolect(){
	$para=$_SESSION['wisdom'];
	$queryvisto=mysql_query("SELECT Visto FROM chat WHERE Para='$para'");
	$vistotam=mysql_num_rows($queryvisto);
	$i=0;
	$contador=0;
	while($i<$vistotam){
		mysql_data_seek($queryvisto,$i);
		$visto=mysql_fetch_array($queryvisto);
		if($visto[0]!="Si"){
			$contador++;
		}
		$i++;
	}
	if($contador>99){
		$contador=99;
	}
	if($contador<10){
		$html= "-&nbsp;&nbsp;".$contador."&nbsp;&nbsp;";
	}
	if($contador>=10){
		$html= "-&nbsp;".$contador."&nbsp;";
	}
	if($contador>0){
		return($html);
	}
}

function visto($usuario){
	$para=$_SESSION['wisdom'];
	mysql_query("UPDATE chat SET Visto='Si' WHERE Para='$para' and De='$usuario' and Visto=''");
}

function chats(){
	$querychats = mysql_query("SELECT Para, De FROM chat WHERE Para = '$_SESSION[wisdom]' or De = '$_SESSION[wisdom]'") or die(mysql_error());
	$a=0;
	$b=mysql_num_rows($querychats);
	$chats;
	while($a<$b){
		mysql_data_seek($querychats,$a);
		$achats= mysql_fetch_array($querychats);
		if($achats[0]!=$_SESSION["wisdom"]){
			$queryperfil = mysql_query("SELECT Fotoperfil,Nombre FROM usuarios WHERE Usuario='$achats[0]'") or die(mysql_error());
			$aperfil= mysql_fetch_array($queryperfil);
			$mensajespendientes=mensajespendientes($achats[0]);
			$chats[$a]='<a href=chat.php?t='.$achats[0].'&&n='.$aperfil[1].'><img src=perfil/'.$aperfil[0].' class=imgperfil>&nbsp;&nbsp;'.$achats[0].'</a>'.$mensajespendientes."<br>";
		}
		else if($achats[0]==$_SESSION["wisdom"]){
			$queryperfil = mysql_query("SELECT Fotoperfil,Nombre FROM usuarios WHERE Usuario='$achats[1]'") or die(mysql_error());
			$aperfil= mysql_fetch_array($queryperfil);
			$mensajespendientes=mensajespendientes($achats[1]);
			$chats[$a]='<a href=chat.php?t='.$achats[1].'&&n='.$aperfil[1].'><img src=perfil/'.$aperfil[0].' class=imgperfil>&nbsp;&nbsp;'.$achats[1].'</a>'.$mensajespendientes."<br>";
		}
		$a++;
	}
	if(isset($chats[0])){
		$chats=array_reverse($chats);
		$chats=norepitearray($chats);
		$a=0;
		while($a<count($chats)){
			echo $chats[$a];
			$a++;
		}
	}
}

function buscador($nombre){
	$a=mysql_query("SELECT Usuario FROM usuarios WHERE Nombre LIKE '$nombre%' or Usuario LIKE '$nombre%' or  Correo LIKE '$nombre%'");
	$ta=mysql_num_rows($a);
	$i=0;
	$usuarios=array();
	$nombres=array();
	$perfiles=array();
	while($i<$ta){
		$a= mysql_query("SELECT Fotoperfil,Nombre,Usuario FROM usuarios WHERE Nombre LIKE '$nombre%' or Usuario LIKE '$nombre%' or  Correo LIKE '$nombre%'");
		mysql_data_seek($a,$i);
		$a=mysql_fetch_array($a);
		$perfiles[$i]=$a["Fotoperfil"];
		$usuarios[$i]=$a["Usuario"];
		$nombres[$i]=$a["Nombre"];
		$i++;
	}
	$tamusuarios=count($usuarios);
	$i=0;
	
	while($i<$tamusuarios){
		$mensajespendientes=mensajespendientes($usuarios[$i]);
		$chats[$i]='<a href=chat.php?t='.$usuarios[$i].'&&n='.$nombres[$i].'><img src=perfil/'.$perfiles[$i].' class=imgperfil>&nbsp;&nbsp;'.$usuarios[$i].'</a>'.$mensajespendientes."<br>";
		echo $chats[$i];
		$i++;
	}
}
?>