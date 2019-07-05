<?
function encriptaclave($contra,$clave){
	$tamcontra=strlen($contra);
	$contrafinal="";
	$i=0;
	while($i<$tamcontra){
		$contrafinal=$contrafinal.$contra[$i].$clave;
		$i++;
	}
	return encripta($contrafinal);
}

function desencriptaclave($contra,$clave){
	$tamusuario=strlen($clave);
	$contra=desencripta($contra);
	$tamcontra=strlen($contra);
	$contrafinal="";
	$i=0;
	while($i<$tamcontra){
		$contrafinal=$contrafinal.$contra[$i];
		$i=$i+$tamusuario+1;
	}
	return $contrafinal;
}

function encripta($contra){
	
	$valor=array("","!",'"','#','$','%','&',"'","(",")","*","+",",",'-','.',"/","0","1","2","3","4","5","6","7","8","9",":",";","<","=",">","?","@","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z",']','[',"^","_","`","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","Á","É","Í","Ó","Ú","á","é","í","ó","ú"," ");
	$clave=array("","NPoI3t","IzSbxv","MuHByd","DKz8FU","eFKHfJ","xjGC5T","9DBbYE","CiCZct","H6PiX8","4JBXVF","wfGd1K","E38uvb","WDJstb","qySvVT","xVlUaE","Zb4NPu","drG0zy","YyMZJP","S1xQW8","ScGHK3","rHUK5T","RY8k9J","jP4i5J","AKvnvH","SiJ8PO","mz1hJQ","yxMaV1","v1KERq","fPudGx","mUHf11","St6I3U","zvkn9z","leZ6oP","hK9uWJ","RUU5x0","aHNmIy","xfXlN1","olsg6X","BzqDUm","1KWO63","Wh3uC2","L2jEy0","tcLus4","UMPvqR","h0NkTg","ZNxmOv","reJSO9","HbIalR","kqlYWF","j4nccX","JKv6HF","bJOe7H","vRRaYw","3KVzu9","VvT4lb","ji1N9B","S4g4p2","oRJ7Uw","geEc8U","w5Mz7Q","byjGam","GeWHeC","7nN0bA","QfhkGH","cOpP6Q","cBJiaB","2ZETSr","TiIvpw","laFmaE","AJ0fb7","hF0Jvp","KSMj5h","HoCaKP","9GnOuG","L5xhGJ","GBCQGn","NJx8ZG","oIx9mr","GJKwhZ","S70IcT","MJmcX0","OfjBRB","eBOGVq","FU3YPz","T7tKVt","AcMiBR","mwOuxP","oabSsa","xwZViB","LP83Cw","U86Jff","2iOS1A","2y9rOB","yXrWdP","F0hEt4","HAfgxy","tKoqPz","TVa70C","Hf1cl8","azwSK1","po6Y5c");
	
	$i=0;
	$j=strlen($contra);
	$k=count($valor);
	$encripta="";
	while($i<$j){
		$existe=0;
		$l=0;
		while($l<$k){
			if($contra[$i]==$valor[$l]){
				$existe=$l;
			}
			if($existe!=0){
				$l=$k;
			}
			$l++;
		}
		$encripta=$encripta.$clave[$existe];
		$i++;
	}
	return($encripta);
}

function desencripta($contra){
	
	$valor=array("","!",'"','#','$','%','&',"'","(",")","*","+",",",'-','.',"/","0","1","2","3","4","5","6","7","8","9",":",";","<","=",">","?","@","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z",']','[',"^","_","`","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","Á","É","Í","Ó","Ú","á","é","í","ó","ú"," ");
	$clave=array("","NPoI3t","IzSbxv","MuHByd","DKz8FU","eFKHfJ","xjGC5T","9DBbYE","CiCZct","H6PiX8","4JBXVF","wfGd1K","E38uvb","WDJstb","qySvVT","xVlUaE","Zb4NPu","drG0zy","YyMZJP","S1xQW8","ScGHK3","rHUK5T","RY8k9J","jP4i5J","AKvnvH","SiJ8PO","mz1hJQ","yxMaV1","v1KERq","fPudGx","mUHf11","St6I3U","zvkn9z","leZ6oP","hK9uWJ","RUU5x0","aHNmIy","xfXlN1","olsg6X","BzqDUm","1KWO63","Wh3uC2","L2jEy0","tcLus4","UMPvqR","h0NkTg","ZNxmOv","reJSO9","HbIalR","kqlYWF","j4nccX","JKv6HF","bJOe7H","vRRaYw","3KVzu9","VvT4lb","ji1N9B","S4g4p2","oRJ7Uw","geEc8U","w5Mz7Q","byjGam","GeWHeC","7nN0bA","QfhkGH","cOpP6Q","cBJiaB","2ZETSr","TiIvpw","laFmaE","AJ0fb7","hF0Jvp","KSMj5h","HoCaKP","9GnOuG","L5xhGJ","GBCQGn","NJx8ZG","oIx9mr","GJKwhZ","S70IcT","MJmcX0","OfjBRB","eBOGVq","FU3YPz","T7tKVt","AcMiBR","mwOuxP","oabSsa","xwZViB","LP83Cw","U86Jff","2iOS1A","2y9rOB","yXrWdP","F0hEt4","HAfgxy","tKoqPz","TVa70C","Hf1cl8","azwSK1","po6Y5c");
	
	$contra=corta6partes($contra);
	$j=count($contra);
	$k=count($clave);
	$desencripta="";
	$i=0;
	while($i<$j){
		$l=0;
		$existe=false;
		$m=0;
		while($l<$k){
			if($contra[$i]==$clave[$l]){
				$existe=true;
			}
			if($existe){
				$m=$l;
				$l=$k;
			}
			$l++;
		}
		$desencripta=$desencripta.$valor[$m];
		$i++;
	}
	
	return($desencripta);
}

function corta6partes($str){
	$tam=strlen($str);
	$i=$tam/6;
	$j=0;
	$k=0;
	while($j<$i){
		$array[$j]="";
		$j++;
	}
	$j=0;
	while($j<$i){
		$l=0;
		while($l<6){
			$array[$j]=$array[$j].$str[$k];
			$l++;
			$k++;
		}
		$j++;
	}
	return $array;
}

function generaclaves(){
	$array=array("A","B","C","D","E","F","G","H","I","J","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","0","1","2","3","4","5","6","7","8","9");
	$array2=array(" ","!",'"','#','$','%','&',"'","(",")","*","+",",",'-','.',"/","0","1","2","3","4","5","6","7","8","9",":",";","<","=",">","?","@","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z",']','[',"^","_","`","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","Á","É","Í","Ó","Ú","á","é","í","ó","ú");
	$tamarray=count($array)-1;
	$i=0;
	$claves="array(";
	while($i<count($array2)){
		$claves=$claves.'"'.$array[rand(0,$tamarray)].$array[rand(0,$tamarray)].$array[rand(0,$tamarray)].$array[rand(0,$tamarray)].$array[rand(0,$tamarray)].$array[rand(0,$tamarray)].'",';
		$i++;
	}
	$claves=$claves.");";
	echo $claves;
}

function serepite (){
	$clave=array("","NPoI3t","IzSbxv","MuHByd","DKz8FU","eFKHfJ","xjGC5T","9DBbYE","CiCZct","H6PiX8","4JBXVF","wfGd1K","E38uvb","WDJstb","qySvVT","xVlUaE","Zb4NPu","drG0zy","YyMZJP","S1xQW8","ScGHK3","rHUK5T","RY8k9J","jP4i5J","AKvnvH","SiJ8PO","mz1hJQ","yxMaV1","v1KERq","fPudGx","mUHf11","St6I3U","zvkn9z","leZ6oP","hK9uWJ","RUU5x0","aHNmIy","xfXlN1","olsg6X","BzqDUm","1KWO63","Wh3uC2","L2jEy0","tcLus4","UMPvqR","h0NkTg","ZNxmOv","reJSO9","HbIalR","kqlYWF","j4nccX","JKv6HF","bJOe7H","vRRaYw","3KVzu9","VvT4lb","ji1N9B","S4g4p2","oRJ7Uw","geEc8U","w5Mz7Q","byjGam","GeWHeC","7nN0bA","QfhkGH","cOpP6Q","cBJiaB","2ZETSr","TiIvpw","laFmaE","AJ0fb7","hF0Jvp","KSMj5h","HoCaKP","9GnOuG","L5xhGJ","GBCQGn","NJx8ZG","oIx9mr","GJKwhZ","S70IcT","MJmcX0","OfjBRB","eBOGVq","FU3YPz","T7tKVt","AcMiBR","mwOuxP","oabSsa","xwZViB","LP83Cw","U86Jff","2iOS1A","2y9rOB","yXrWdP","F0hEt4","HAfgxy","tKoqPz","TVa70C","Hf1cl8","azwSK1","po6Y5c","wXnCJC","6RQ40E");
	
	$i=count($clave);
	$j=0;
	$l=0;
	while($j<$i){
		$k=0;
		while($k<$i){
			if($j!=$k){
				if($clave[$j]==$clave[$k]){$l++;}
			}
			$k++;
		}
		$j++;
	}
	echo $l;
}

?>