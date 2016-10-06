<?php 
	$voornaam = "Thomas";
	$achternaam = "Verhelst";
	$volledigeNaam = $voornaam." ".$achternaam;
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Oplossing Concatenate</title>
	</head>
	<body>
		<h1><?= $volledigeNaam;?></h1>
		<p>Er zitten <?= strlen($volledigeNaam)?> karakters in de bovenliggende string.</p>
	</body>
</html>