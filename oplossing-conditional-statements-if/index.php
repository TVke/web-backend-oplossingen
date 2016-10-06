<?php
	
	// deel 1
	$getal=1;
	
	if($getal==1){
		$dag="maandag";
	}
	if($getal==2){
		$dag="dinsdag";
	}
	if($getal==3){
		$dag="woensdag";
	}
	if($getal==4){
		$dag="donderdag";
	}
	if($getal==5){
		$dag="vrijdag";
	}
	if($getal==6){
		$dag="zaterdag";
	}
	if($getal==7){
		$dag="zondag";
	}
	
	// deel 2
	$dagCaps = strtoupper($dag);
	$dagASmall = str_replace("A", "a", $dagCaps);
	$lastA = strrpos($dagCaps, "A");
	$dagLastASmall = substr($dagCaps, 0, $lastA)."a".substr($dagCaps, $lastA+1);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>conditional statements if</title>
	</head>
	<body>
		<h1>conditional statements if</h1>
		<h2>deel 1</h2>
		<p>De dag is: <?= $dag?></p>
		<h2>deel 2</h2>
		<p>De dag in hoofdletters is: <?= $dagCaps?></p>
		<p>De dag met a klein is: <?= $dagASmall?></p>
		<p>De dag met laatste a klein is: <?= $dagLastASmall?></p>
	</body>
</html>