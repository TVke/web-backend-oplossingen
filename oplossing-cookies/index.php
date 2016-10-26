<?php
$user = file_get_contents("user.txt");
$userarray = explode(",",$user);
$fouutmelding=false;
$ingelogd=false;

if(isset($_COOKIE['ingelogd'])&&$_COOKIE['ingelogd']==="correct"){
	$ingelogd=true;
}

if(isset($_POST['login'])) {
	if ($_POST['username'] === $userarray[0] && $_POST['password'] === $userarray[1]) {
		setcookie("ingelogd","correct",time()+360);
	} else {
		$fouutmelding = true;
	}
}
if(isset($_GET['uitloggen'])){
	unset($_COOKIE['ingelogd']);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cookies</title>
</head>
<body>
<h1>Cookies</h1>
<h2>Deel 1</h2>
<?php if($ingelogd):?>
	<h3>Dashboard</h3>
	<p>U bent ingelogd.</p>
	<a href="index.php?uitloggen">Uitloggen</a>
<?php else:?>
<h3>Inloggen</h3>
<?php if($fouutmelding):?>
	<p>Gebruikersnaam en/of paswoord niet correct. Probeer opnieuw.</p>
<?php endif;?>
<form action="index.php" method="post">
	<label for="user">gebruikersnaam</label>
	<input type="text" id="user" name="username">
	<label for="pass">paswoord</label>
	<input type="password"id="pass" name="password">
	<input type="submit" value="verzenden" name="login">
</form>
<?php endif;?>
</body>
</html>