<?php
	
	// deel 1
	$md5HashKey="d1fa402db91a7a93c4f414b8278ce073";
	function hashFunc1($naald,$hasKey){
		return (substr_count($hasKey,$naald)/strlen($hasKey))*100;
	}
	function hashFunc2($naald,$hasKey){
		return (substr_count($hasKey,$naald)/strlen($hasKey))*100;
	}
	function hashFunc3($naald,$hasKey){
		return (substr_count($hasKey,$naald)/strlen($hasKey))*100;
	}
	$naald1="2";
	$naald2="8";
	$naald3="a";
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>functions gevorderd</title>
	</head>
	<body>
		<h1>functions gevorderd</h1>
		<h2>deel 1</h2>
		<p>Functie 1: De needle '<?= $naald1?>' komt <?= hashFunc1($naald1,$md5HashKey)?>% voor in de hash key '<?= $md5HashKey?>'</p>
		<p>Functie 2: De needle '<?= $naald2?>' komt <?= hashFunc2($naald2,$md5HashKey)?>% voor in de hash key '<?= $md5HashKey?>'</p>
		<p>Functie 3: De needle '<?= $naald3?>' komt <?= hashFunc3($naald3,$md5HashKey)?>% voor in de hash key '<?= $md5HashKey?>'</p>
	</body>
</html>