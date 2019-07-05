<?
function ordenaarray($array){
	$arraynum = count($array)-1;
	for($i=1; $i<$arraynum; $i++){
		for($j=0; $j<$arraynum-$i; $j++){
			if($array[$j]<$array[$j+1]){
				$k=$array[$j+1];
				$array[$j+1]=$array[$j];
				$array[$j]=$k;
			}
		}
	}
	return $array;
}

function norepitearray($array){
	$arraynum = count($array);
	$i=0;
	$k=0;
	$narray[0]="";
	while($i<$arraynum){
		$j=0;
		$rep=0;
		$narraynum=count($narray);
		while($j<$narraynum){
			if($narray[$j]==$array[$i]){
				$rep++;
			}
			$j++;
		}
		if($rep==0){
			$narray[$k]=$array[$i];
			$k++;
		}
		$i++;
	}
	return $narray;
}

function noCache(){
	header("Expires: Tue, 01 Jul 2001 06:00:00 GMT");
	header("Last-Modified:".gmdate("D, d M Y H:i:s")."GMT");
	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0",false);
	header("Pragma: no-cache");
}
?>