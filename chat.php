<? require("librerias/libreriaprincipal.php"); $datos=cabecera("Chat"); $usuario=$datos[0]; $cuenta=$datos[1]; ?>
<? require("librerias/libreriaproceso.php"); noCache(); ?>
<? require("librerias/chats.php"); if(isset($_GET['e'])){enviarmensaje();} ?>
<? 
	
	if(isset($_GET["t"])){$t=$_GET["t"];}else{$t="";} $queryexiste = mysql_query("SELECT Usuario FROM usuarios WHERE Usuario = '$t'") or die(mysql_error());
	$usuarioexiste=mysql_fetch_array(mysql_query("SELECT Usuario,Fotoperfil FROM usuarios WHERE Usuario='$t'"));
	$usuarioexiste=count($usuarioexiste);
?>				
	<h1>Chat</h1>
	
	<center><div class=chat id=chat>
		<table>
			<tr><td class="buscador"><form><input type="search" name="b" placeholder="Buscar" autocomplete="off" <?if($usuarioexiste<=1){echo "autofocus";} ?> <? if(isset($_GET['b'])){ echo "value=".$_GET['b']; } ?> ><button><img src="buscar.png"></button></form></td><td></td><td class="nombre"><? if(isset($_GET['n'])) echo $_GET['n']; else echo $t; ?></td></tr>
				<tr><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td></tr>
				<tr><td class="chats" id="chats"><?
				if(isset($_GET['b'])&&$_GET['b']){
					$busqueda=$_GET['b'];
					buscador($busqueda);
				}
				else{
					chats();
				}
				?>
				</td><td></td><td><div class="mensaje" id="msj">
				<?
					if($usuarioexiste<=1 && isset($_GET["t"]) && $t!="" ){echo "El usuario no existe"; }
					$querychat = mysql_query("SELECT * FROM chat WHERE (Para = '$_SESSION[wisdom]' && De = '$t') or (Para = '$t' && De = '$_SESSION[wisdom]')") or die(mysql_error());
					$c=0;
					$d=mysql_num_rows($querychat);
					visto($t);
					while($c<$d){
						mysql_data_seek($querychat,$c);
						$achat= mysql_fetch_array($querychat);
						$mensaje= emojis($achat["Contenido"]);
						if($achat["De"]==$_SESSION["wisdom"]){
							echo "<div class=contenedor><div class=fechade>".$achat["Fecha"]."</div>";
							echo "<div class=de>".$mensaje."</div></div>";
						}
						else if($achat["Para"]==$_SESSION["wisdom"]){
							echo "<div class=contenedor><div class=para>".$mensaje."</div>";
							echo "<div class=fechapara>".$achat["Fecha"]."</div></div>";
						}
						$c++;
					}
				?>
					</div></td></tr>
			<tr><td></td><td></td><td><br>
				<center><form action="chat.php?e=true&&t=<? echo $t; ?>" method="post">
				<? echo "<input type=hidden name=para id=para value=$t>";
				if($usuarioexiste>1 && $t!="Wisdom" && $t!=$_SESSION["wisdom"]){ ?> <input type=text name=mensaje id=mensaje required autocomplete=off autofocus> <? }
				else { ?> <input type=text name=mensaje id=mensaje required autocomplete=off disabled> <? }
				?>
				&nbsp;&nbsp;&nbsp;<button type="submit" class="enviar" <? if($usuarioexiste>1 && $t!="Wisdom"){}else{echo "disabled";} ?>><img src="enviar.png"></button></form></center>
			</td></tr>
		</table>
	</div></center>
	</header>
	<div class=contenido>
		<script type="text/javascript">
			msj.scrollTop = msj.scrollHeight;
		</script>
	</div>
</article>
<? footer(); ?>