<?php session_start();

if(isset($_POST['register'])) {
	$_SESSION['email'] = $_POST['mail'];
	$_SESSION['password'] = $_POST['password'];

	try {
		$db = new pdo('mysql:host=localhost;dbname=opdracht-security-login', 'root', 'root');
		if ($db) {
			if (filter_var($_SESSION['email'], FILTER_VALIDATE_EMAIL)) {
				$email = $db->query("SELECT * FROM users WHERE email= '".$_SESSION['email']."'");
				if(!$email->fetch()){
					$salt = uniqid(mt_rand(), true);
					$pass = hash("sha512",$_SESSION['password'].$salt);
					$mailHash = hash("sha512",$_SESSION['email'].$salt);
					$newUser = $db->prepare("INSERT INTO users (email,salt,hashed_password) VALUES (:mail,:salt,:hash)");
					$newUser->bindParam(':mail',$_SESSION['email']);
					$newUser->bindParam(':salt',$salt);
					$newUser->bindParam(':hash',$pass);
					if($newUser->execute()){
						setcookie("login",$_SESSION['email'].",".$mailHash,time()+60*60*24*30,"/");
						header("Location: ../");
					}else{
						throw new Exception('het toevoegen. Probeer opnieuw. ');
					}
				}else{
					$_SESSION['notify'] = ['mail','Dit emailadres is al in gebruik. '];
					header("Location: .");
				}
			} else {
				$_SESSION['notify'] = ['mail','Er zit een fout in uw emailadres. '];
				header("Location: .");
			}
		} else {
			throw new Exception("de database connectie. Probeer opnieuw. ");
		}
	} catch (Exception $e) {
		echo "Er liep iets mis met " . $e->getMessage();
	}
}else{
	$_SESSION['notify'] = ['login','u moet eerst inloggen. '];
	header("Location: ../login/");
}

