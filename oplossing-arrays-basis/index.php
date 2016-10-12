<?php
	
	// deel 1
	$dieren=array("hond","kat","paard","vis","egel","eland","sprinkhaan","krekel","lama","emoe");
	$dierenoptie2[0]="Hond";
	$dierenoptie2[1]="Kat";
	$dierenoptie2[2]="Paard";
	$dierenoptie2[3]="Vis";
	$dierenoptie2[4]="Egel";
	$dierenoptie2[5]="Eland";
	$dierenoptie2[6]="Sprinkhaan";
	$dierenoptie2[7]="Krekel";
	$dierenoptie2[8]="Lama";
	$dierenoptie2[9]="Emoe";
	
	$voertuigen=array(
	"landvoertuigen"=>array("rolschaatsen","fiets","skateboard"),
	"luchtvoertuigen"=>"vliegtuig",
	"watervoertuigen"=>"boot");
	
	// deel 2
	
	$getallen=array(1, 2, 3, 4, 5);
	
	$multiplied=1;
	for($i=0,$ilen=count($getallen);$i<$ilen;$i++){
		$multiplied*=$getallen[$i];
	}
	
	$uneven=array();
	for($i=0,$ilen=count($getallen);$i<$ilen;$i++){
		if($getallen[$i]%2==1){
			array_push($uneven, $getallen[$i]);
		}
	}
	
	$reversed=array_reverse($getallen);
	
	$reversPlusNormal=array();
	for($i=0,$ilen=count($getallen);$i<$ilen;$i++){
		$reversPlusNormal[$i]=$getallen[$i]+$reversed[$i];
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>arrays basis</title>
	</head>
	<body>
		<h1>arrays basis</h1>
		<h2>deel 1</h2>
		<p><?php var_dump($voertuigen);?></p>
		<h2>deel 2</h2>
		<p>de array: <?php print_r($getallen);?></p>
		<p>vermenigvuldigd: <?= $multiplied?></p>
		<p>de oneven: <?php print_r($uneven);?></p>
		<p>achterstevoren: <?php print_r($reversed);?></p>
		<p>som van normaal en achterstevoren: <?php print_r($reversPlusNormal);?></p>
	</body>
</html>