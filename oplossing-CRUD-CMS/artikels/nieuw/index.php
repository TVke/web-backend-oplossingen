<?php session_start();
$titel="CRUD-CMS";
$ownStyle = "../../CMS.css";

if(isset($_COOKIE['login'])){
	try {
		$db = new pdo('mysql:host=localhost;dbname=opdracht-security-login', 'root', 'root');
		if ($db) {
			$cookiePart = explode(",",$_COOKIE['login']);
			$getSalt = $db->query("SELECT salt FROM users WHERE email= '".$cookiePart[0]."'");
			$salt = $getSalt->fetch(PDO::FETCH_ASSOC);
			$mailHash = hash("sha512",$cookiePart[0].$salt['salt']);
			if($mailHash !== $cookiePart[1]){
				setcookie('login',"",1,"/");
				setcookie('login',false);
				unset($_COOKIE['login']);
				$_SESSION['notify'] = ['login','Er werd geknoeid. Probeer opnieuw. '];
				header("Location: ../../login/");
			}
		} else {
			throw new Exception("de database connectie. Probeer opnieuw. ");
		}
	} catch (Exception $e) {
		echo "Er liep iets mis met " . $e->getMessage();
	}
}else{
	$_SESSION['notify'] = ['login','u moet eerst inloggen. '];
	header("Location: ../../login/");
}



require("../../../generalheader.html");
require("body.php");
require("../../../generalfooter.html");

unset($_SESSION['notify']);