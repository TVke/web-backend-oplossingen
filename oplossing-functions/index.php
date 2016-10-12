<?php
	
	// deel 1
	function berekenSom($getal1,$getal2){
		return $getal1+$getal2;
	}
	function vermenigvuldig($getal1,$getal2){
		return $getal1*$getal2;
	}
	function isEven($getal){
		$even=false;
		if($getal%2==0){
			$even=true;
		}
		return $even;
	}
	$getalEen=88;
	$getalTwee=2;
	if(isEven($getalEen)){
		$showResult="even";
	}
	else{
		$showResult="oneven";
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>functions</title>
	</head>
	<body>
		<h1>functions</h1>
		<h2>deel 1</h2>
		<p>de som van <?= $getalEen?> en <?= $getalTwee?> is <?= berekenSom($getalEen,$getalTwee)?></p>
		<p>de vermenigvuldiging van <?= $getalEen?> en <?= $getalTwee?> is <?= vermenigvuldig($getalEen,$getalTwee)?></p>
		<p><?= $getalEen?> is <?= $showResult?></p>
	</body>
</html>