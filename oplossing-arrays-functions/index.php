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
	
	
	// deel 3
	
	
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
		<p></p>
		<h2>deel 3</h2>
		<p></p>
	</body>
</html>