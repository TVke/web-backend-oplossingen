<?php


class cookieCheck
{
	public function cookie(){
		if(isset($_COOKIE['login'])){
			try {
				$db = new pdo('mysql:host=localhost;dbname=oplossing-file-upload', 'root', 'root');
				if ($db) {
					$cookiePart = explode(",",$_COOKIE['login']);
					$getSalt = $db->query("SELECT salt FROM users WHERE email= '".$cookiePart[0]."'");
					$salt = $getSalt->fetch(PDO::FETCH_ASSOC);
					$mailHash = hash("sha512",$cookiePart[0].$salt['salt']);
					if($mailHash === $cookiePart[1]){
						return true;
					}else{
						return false;
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
	}
}