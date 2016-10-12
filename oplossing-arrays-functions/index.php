<?php
	
	// deel 1
	$dieren=array("geit","schaap","krokodil","eend","baardhagedis");
	$aantalDieren=count($dieren);
	$teZoekenDier="eend";
	$zoekResultaat="";
	if(!in_array($teZoekenDier, $dieren)){
		$zoekResultaat="niet ";
	}
	
	// deel 2
	$dieren2=array("geit","schaap","krokodil","eend","baardhagedis");
	arsort($dieren2);
	$zoogdieren=array("varken","dolfijn","paard");
	$dierenLijst=$dieren2+$zoogdieren;
	
	// deel 3
	$waarden=array(8, 7, 8, 7, 3, 2, 1, 2, 4);
	$waardenUnique=array_unique($waarden);
	$waardenSorted=$waardenUnique;
	arsort($waardenSorted);
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>arrays basis</title>
	</head>
	<body>
		<h1>arrays basis</h1>
		<h2>deel 1</h2>
		<p>Er zitten <?= $aantalDieren?> in deze array: <?php print_r($dieren)?>.</p>
		<p>Het woord "<?= $teZoekenDier?>" is <?= $zoekResultaat?>gevonden in de bovenstaande array.</p>
		<h2>deel 2</h2>
		<p>geordend: <?php print_r($dieren2);?></p>
		<p>Zoogdieren: <?php print_r($zoogdieren);?></p>
		<p>dierenlijst: <?php print_r($dierenLijst);?></p>
		<h2>deel 3</h2>
		<p>De originele array: <?php print_r($waarden);?></p>
		<p>De unieke waarden array: <?php print_r($waardenUnique);?></p>
		<p>De gesoreerde array: <?php print_r($waardenSorted);?></p>
	</body>
</html>