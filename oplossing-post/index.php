<?php
	
	$username='stijn';
	$password='azerty';
	$fout=false;
	$correct=false;
	$message="Welkom ".$username;
	$wrongMessage="Er ging iets mis bij het inloggen, probeer opnieuw";
	if(isset($_POST['send'])){
		if($_POST['user']==$username && $_POST['pass']=$password){
			$correct=true;
		}else{
			$fout=true;
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>POST</title>
	</head>
	<body>
		<h1>POST</h1>
		<h2>Deel 1</h2>
		<form name="inloggen" action="index.php" method="post">
			<label for="username">gebruikersnaam</label>
			<input type="text" name="user" id="username">
			<label for="password">paswoord</label>
			<input type="password" name="pass" id="password">
			<input type="submit" value="inloggen" name="send">
		</form>
		<?php if($correct):?>
		<p><?= $message?></p>
		<?php endif;?>
		<?php if($fout):?>
		<p><?= $wrongMessage?></p>
		<?php endif;?>
	</body>
</html>