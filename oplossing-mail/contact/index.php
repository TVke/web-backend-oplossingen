<?php session_start();

$_SESSION['email'] = $_POST['email'];
$_SESSION['message'] = $_POST['message'];
if($_POST['checkbox']===1){
	$_SESSION['checkbox'] = true;
}else{
	$_SESSION['checkbox'] = false;
}

if(isset($_POST['send'])){
	if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
		try {
			$db = new pdo('mysql:host=127.0.0.1;dbname=contact_messages', 'root', 'root');
			if ($db) {
				define('ADMIN','tvke91@gmail.com');
				$newMail = $db->prepare("INSERT INTO mails (email,message) VALUES (:mail,:message)");
				$newMail->bindParam(':mail',$_POST['email']);
				$newMail->bindParam(':message',$_POST['message']);
				if($newMail->execute()){
					if($_SESSION['checkbox']){
						if(mail(ADMIN,"Iemand heeft u gecontacteerd",$_POST['message'],"From: ".$_POST['email']."\r\nContent-Type: text/html; charset=ISO-8859-1") && mail($_POST['email'],"U contacteerde ons",$_POST['message'],"Content-Type: text/html; charset=ISO-8859-1")){
							$_SESSION['notify'] = ['succes','Uw mail is verstuur. '];
							unset($_SESSION['checkbox']);
							unset($_SESSION['message']);
							unset($_SESSION['email']);
							header("Location: ../");
						}else{
							$_SESSION['notify'] = ['error','Er liep iets mis bij het versturen. Probeer opnieuw '];
							header("Location: ../");
						}
					}else{
						if(mail(ADMIN,"Iemand heeft u gecontacteerd",$_POST['message'],"From: ".$_POST['email']."\r\nContent-Type: text/html; charset=ISO-8859-1")){
							$_SESSION['notify'] = ['succes','Uw mail is verstuur. '];
							unset($_SESSION['checkbox']);
							unset($_SESSION['message']);
							unset($_SESSION['email']);
							header("Location: ../");
						}else{
							$_SESSION['notify'] = ['error','Er liep iets mis bij het versturen. Probeer opnieuw '];
							header("Location: ../");
						}
					}
				}else{
					$_SESSION['notify'] = ['error','Er liep iets mis bij het versturen. Probeer opnieuw '];
					header("Location: ../");
				}
			} else {
				throw new Exception("de database connectie. Probeer opnieuw. ");
			}
		} catch (Exception $e) {
			echo "Er liep iets mis met " . $e->getMessage();
		}
	}else{
		$_SESSION['notify'] = ['error','Uw emailadres is niet correct. '];
		header("Location: ../");
	}
}else{
	$_SESSION['notify'] = ['error','Er liep iets mis. Probeer opnieuw. '];
	header("Location: ../");
}
