<?php
	
	// deel 1
	$getal=45;
	$eersteTien;
	$tweedeTien;
	if($getal<10){
		$eersteTien=0;
		$tweedeTien=10;
	}
	else if($getal<20){
		$eersteTien=10;
		$tweedeTien=20;
	}
	else if($getal<30){
		$eersteTien=20;
		$tweedeTien=30;
	}
	else if($getal<40){
		$eersteTien=30;
		$tweedeTien=40;
	}
	else if($getal<50){
		$eersteTien=40;
		$tweedeTien=50;
	}
	else if($getal<60){
		$eersteTien=50;
		$tweedeTien=60;
	}
	else if($getal<70){
		$eersteTien=60;
		$tweedeTien=70;
	}
	else if($getal<80){
		$eersteTien=70;
		$tweedeTien=80;
	}
	else if($getal<90){
		$eersteTien=80;
		$tweedeTien=90;
	}
	else{
		$eersteTien=90;
		$tweedeTien=100;
	}
	$volledigeZin="Het getal ".$getal." ligt tussen ".$eersteTien." en ".$tweedeTien;
	$omgekeerdeZin=$volledigeZin;
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>conditional statements if elseif</title>
	</head>
	<body>
		<h1>conditional statements if elseif</h1>
		<h2>deel 1</h2>
		<p>Het getal <?= $getal?> ligt tussen <?= $eersteTien?> en <?= $tweedeTien?></p>
		<p>omgekeerd is dit: <?= $omgekeerdeZin?></p>
	</body>
</html>