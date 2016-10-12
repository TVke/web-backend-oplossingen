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
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>arrays basis</title>
	</head>
	<body>
		<h1>arrays basis</h1>
		<h2>deel 1</h2>
		<p><?= var_dump($voertuigen);?></p>
		<h2>deel 2</h2>
		<p></p>
	</body>
</html>