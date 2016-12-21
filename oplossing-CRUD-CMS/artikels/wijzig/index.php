<?php session_start();
$titel="CRUD-CMS";
$ownStyle = "../../CMS.css";

if(isset($_COOKIE['login'])) {
	try {
		$db = new pdo('mysql:host=127.0.0.1;dbname=opdracht-security-login', 'root', 'root');
		if ($db) {
			$cookiePart = explode(",", $_COOKIE['login']);
			$getSalt = $db->query("SELECT salt FROM users WHERE email= '" . $cookiePart[0] . "'");
			$salt = $getSalt->fetch(PDO::FETCH_ASSOC);
			$mailHash = hash("sha512", $cookiePart[0] . $salt['salt']);
			if ($mailHash !== $cookiePart[1]) {
				setcookie('login', "", 1, "/");
				setcookie('login', false);
				unset($_COOKIE['login']);
				$_SESSION['notify'] = ['login', 'Er werd geknoeid. Probeer opnieuw. '];
				header("Location: ../../login/");
			} else {
				if (isset($_GET['artikel'])) {
					$selectedArticle = $db->prepare("SELECT id,titel,artikel,DATE_FORMAT(datum,'%d-%m-%Y') datum FROM artikels WHERE id = :artikel");
					$selectedArticle->bindParam(':artikel', $_GET['artikel']);
					if (!$selectedArticle->execute()) {
						$_SESSION['notify'] = ['error', 'Er liep iets mis bij het toevoegen. Probeer opnieuw. '];
						header("Location: ../");
					}
				} else {
					$_SESSION['notify'] = ['artikel', 'u moet eerst een artikel selecteren. '];
					header("Location: ../");
				}
			}
		} else {
			throw new PDOException("de database connectie. Probeer opnieuw. ");
		}
	} catch (PDOException $e) {
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
