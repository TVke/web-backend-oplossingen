<?php session_start();
$titel="file-upload";
$ownStyle = "../../file.css";

if(isset($_GET['artikel'])) {
	try {
		$db = new pdo('mysql:host=localhost;dbname=oplossing-file-upload', 'root', 'root');
		if ($db) {
			$newArticle = $db->prepare("UPDATE artikels SET is_active = IF(is_active=1, 0, 1) WHERE id = :artikel");
			$newArticle->bindParam(':artikel',$_GET['artikel']);
			if($newArticle->execute()){
				$_SESSION['notify'] = ['status','De status werd succesvol gewijzigd. '];
				header("Location: ../");
			}else{
				$_SESSION['notify'] = ['error','Er liep iets mis bij het wijzigen. Probeer opnieuw '];
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