<?php 
	
	$fruit = "kokosnoot";
	$fruitlen = strlen($fruit);
	$oInFruit = strpos($fruit,"o");
	if($oInFruit){
		$oInFruit++;
		if($oInFruit > 1 && $oInFruit < 20){
			$oSte = "de ".$oInFruit."de";
		}else{
			$oSte = "de ".$oInFruit."ste";
		}
	}else{
		$oSte = "geen enkele";
	}
	
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Oplossing-string-extra-functions</title>
	</head>
	<body>
		<h1>Oplossing-string-extra-functions</h1>
		<h2>Deel 1</h2>
		<p>Het woord <?= $fruit?> telt <?= $fruitlen?> karakters</p>
		<p>De eerste 'o' in <?= $fruit?> bevindt zich op <?= $oSte?> plaats</p>
		<h2>Deel 2</h2>
		<p></p>
		<h2>Deel 3</h2>
		<p></p>
	</body>
</html>