<?php session_start();

$email = "";
$nick = "";
$mailactief="";
$nickactief="";

if(isset($_GET['edit'])) {

	if($_GET['edit']=="mail"){
		$mailactief="autofocus";
	}
	else if($_GET['edit']=="nick"){
		$nickactief="autofocus";
	}
	$email = $_SESSION['email'];
	$nick = $_SESSION['nick'];
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
<form name="inloggen" action="adres.php" method="post">
	<label for="mail">email</label>
	<input type="email" name="user" id="mail" value="<?= $email?>" <?= $mailactief?>>
	<label for="nick">nickname</label>
	<input type="text" name="pass" id="nick" value="<?= $nick?>" <?= $nickactief?>>
	<input type="submit" value="volgende" name="send"><a href="reset.php">reset Session</a>
</form>
</body>
</html>
