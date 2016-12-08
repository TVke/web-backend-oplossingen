<?php session_start();

if(isset($_POST['login'])) {
	$_SESSION['email'] = $_POST['mail'];

	try {
		$db = new pdo('mysql:host=localhost;dbname=opdracht-security-login', 'root', 'root');
		if ($db) {
				$email = $db->query("SELECT salt,hashed_password FROM users WHERE email= '".$_SESSION['email']."'");
				$dbPass = $email->fetch(PDO::FETCH_ASSOC);
				if($dbPass){
					$pass = hash("sha512",$_POST['password'].$dbPass['salt']);
					if($pass === $dbPass['hashed_password']){
						$mailHash = hash("sha512",$_SESSION['email'].$dbPass['salt']);
						setcookie("login",$_SESSION['email'].",".$mailHash,time()+60*60*24*30);
						header("Location: dashboard.php");
					}else{
						$_SESSION['notify'] = ['pass','Het wachtwoord was incorrect.'];

						header("Location: login.php");
					}
				}else{
					$_SESSION['notify'] = ['mail',"Dit emailadres is nog niet geregistereerd. <a href='index.php'>Registreer hier</a>. "];

					header("Location: login.php");
				}
		} else {
			throw new Exception("de database connectie. Probeer opnieuw. ");
		}
	} catch (Exception $e) {
		echo "Er liep iets mis met " . $e->getMessage();
	}
}else{
	$_SESSION['notify'] = ['login','u moet eerst inloggen. '];
	header("Location: login.php");
}