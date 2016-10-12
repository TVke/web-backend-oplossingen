<?php
	
	// deel 1
	$dag=4;
	switch($dag){
		case 1:
			$dagNaam="maandag";
			break;
		case 2:
			$dagNaam="dinsdag";
			break;
		case 3:
			$dagNaam="woensdag";
			break;
		case 4:
			$dagNaam="donderdag";
			break;
		case 5:
			$dagNaam="vrijdag";
			break;
		case 6:
			$dagNaam="zaterdag";
			break;
		case 7:
			$dagNaam="zondag";
			break;
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>conditional statements switch</title>
	</head>
	<body>
		<h1>conditional statements switch</h1>
		<h2>deel 1</h2>
		<p>Het is vandaag: <?= $dagNaam?></p>
	</body>
</html>