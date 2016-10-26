<?php session_start();

if(isset($_POST['send'])) {
	$_SESSION['email'] = $_POST['user'];
	$_SESSION['nick'] = $_POST['pass'];
}
if(isset($_GET['id'])) {
	if($_GET['id']=="street"){
		$streetactief="autofocus";
	}
	else if($_GET['id']=="number"){
		$numberactief="autofocus";
	}
	else if($_GET['id']=="place"){
		$placeactief="autofocus";
	}
	else if($_GET['id']=="area"){
		$areaactief="autofocus";
	}
	$street = $_SESSION['street'];
	$number = $_SESSION['number'];
	$place = $_SESSION['city'];
	$area = $_SESSION['area'];
}else {
	$street = "";
	$number = "";
	$place = "";
	$area = "";
	$streetactief = "";
	$numberactief = "";
	$placeactief = "";
	$areaactief = "";
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Sessions</title>
	<link rel="stylesheet" href="stijl.css" type="text/css">
</head>
<body>
<h1>Sessions</h1>
<h2>Deel 1</h2>
<h3>registratie</h3>
<ul>
	<li>e-mail: <?= $_SESSION['email']?></li>
	<li>nickname: <?= $_SESSION['nick']?></li>
</ul>
<h3>adres</h3>
<form name="inloggen" action="overzicht.php" method="post">
	<label for="street">straat</label>
	<input type="text" name="streetname" id="street" value="<?= $street?>" <?= $streetactief?>>
	<label for="number">nickname</label>
	<input type="number" name="housenumber" id="number" value="<?= $number?>" <?= $numberactief?>>
	<label for="place">gemeente</label>
	<input type="text" name="city" id="place" value="<?= $place?>" <?= $placeactief?>>
	<label for="area">postcode</label>
	<input type="number" name="areacode" id="area" value="<?= $area?>" <?= $areaactief?>>
	<input type="submit" value="volgende" name="adres"><a href="reset.php">reset Session</a>
</form>
</body>
</html>
