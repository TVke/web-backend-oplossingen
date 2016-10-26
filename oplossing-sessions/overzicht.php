<?php session_start();

if(isset($_POST['adres'])){
	$_SESSION['street']=$_POST['streetname'];
	$_SESSION['number']=$_POST['housenumber'];
	$_SESSION['city']=$_POST['city'];
	$_SESSION['area']=$_POST['areacode'];
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
<h3>Overzicht</h3>
<ul>
	<li><p>e-mail: <?= $_SESSION['email']?></p><a href="index.php?edit=mail">wijzig</a></li>
	<li><p>nickname: <?= $_SESSION['nick']?></p><a href="index.php?edit=nick">wijzig</a></li>
	<li><p>straat: <?= $_SESSION['street']?></p><a href="adres.php?edit=street">wijzig</a></li>
	<li><p>nummer: <?= $_SESSION['number']?></p><a href="adres.php?edit=number">wijzig</a></li>
	<li><p>gemeente: <?= $_SESSION['city']?></p><a href="adres.php?edit=place">wijzig</a></li>
	<li><p>postcode: <?= $_SESSION['area']?></p><a href="adres.php?edit=area">wijzig</a></li>
</ul>
<a href="reset.php">reset Session</a>
</body>
</html>
