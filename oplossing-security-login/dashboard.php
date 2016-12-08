<?php session_start();
$titel="security-login";
if(isset($_COOKIE['login'])){
	try {
		$db = new pdo('mysql:host=localhost;dbname=opdracht-security-login', 'root', 'root');
		if ($db) {
			$cookiePart = explode(",",$_COOKIE['login']);
			$getSalt = $db->query("SELECT salt FROM users WHERE email= '".$cookiePart[0]."'");
			$salt = $getSalt->fetch(PDO::FETCH_ASSOC);
			$mailHash = hash("sha512",$cookiePart[0].$salt['salt']);
			if($mailHash === $cookiePart[1]){
				$logOut="uitloggen";
			}else{
				unset($_COOKIE['login']);
				$_SESSION['notify'] = ['login','Er werd geknoeid. Probeer opnieuw. '];
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

require("../generalheader.html");
require("dashboardBody.php");
require("../generalfooter.html");