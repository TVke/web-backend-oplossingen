<?php session_start();

if(isset($_POST['edit'])) {
	try {
		$db = new pdo('mysql:host=localhost;dbname=oplossing-file-upload', 'root', 'root');
		if ($db) {
			$date = explode("-",$_POST['datum']);
			$datum = $date[2]."-".$date[1]."-".$date[0];

			$newArticle = $db->prepare("UPDATE artikels SET titel = :titel,artikel = :article,datum = :datum WHERE id = :id");
			$newArticle->bindParam(':id',$_POST['id']);
			$newArticle->bindParam(':titel',$_POST['titel']);
			$newArticle->bindParam(':article',$_POST['article']);
			$newArticle->bindParam(':datum',$datum);
			if($newArticle->execute()){
				$_SESSION['notify'] = ['edit','Het artikel werd succesvol gewijzigd '];
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