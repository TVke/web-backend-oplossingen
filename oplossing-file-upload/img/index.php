<?php session_start();

if(isset($_POST)) {
	if(isset($_POST['edit'])){
		try {
			$db = new pdo('mysql:host=127.0.0.1;dbname=oplossing-file-upload', 'root', 'root');
			if ($db) {
				if($_FILES['foto']['error']===0){
					if(($_FILES['foto']['type']==="image/jpeg"||$_FILES['foto']['type']==="image/png"||$_FILES['foto']['type']==="image/gif")&&$_FILES['foto']['size']<2000000){
						$newName = time().str_replace(" ","_",$_FILES['foto']['name']);
						while(file_exists("pics/".$newName)){
							$newName = time().str_replace(" ","_",$_FILES['foto']['name']);
						}
						if(move_uploaded_file($_FILES['foto']['tmp_name'],"pics/".$newName)){
							if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
								$newArticle = $db->prepare("UPDATE users SET email = :email,profile_picture = :picture WHERE id = :id");
								$newArticle->bindParam(':id',$_POST['id']);
								$newArticle->bindParam(':picture',$newName);
								$newArticle->bindParam(':email',$_POST['email']);
								if($newArticle->execute()){
									$_SESSION['notify'] = ['succes','Gegevens werden succesvol opgeslagen. '];
									header("Location: ../profiel/");
								}else{
									$_SESSION['notify'] = ['error','Er liep iets mis bij het wijzigen. Probeer opnieuw '];
									header("Location: ../profiel/");
								}
							}else{
								$_SESSION['notify'] = ['error','Dit is geen geldig emailadres. '];
								header("Location: ../profiel/");
							}
						}else{
							$_SESSION['notify'] = ['error','Er liep iets mis bij het uploaden. probeer opnieuw. '];
							header("Location: ../profiel/");
						}
					}else{
						$_SESSION['notify'] = ['error','Het bestand mag niet groter zijn dan 2MB en moet een .png, .jpg, .gif of .jpeg extentie hebben. probeer opnieuw. '];
						header("Location: ../profiel/");
					}
				}else{
					$_SESSION['notify'] = ['error',$_FILES['foto']['error']];
					header("Location: ../profiel/");
				}
			} else {
				throw new Exception("de database connectie. Probeer opnieuw. ");
			}
		} catch (Exception $e) {
			echo "Er liep iets mis met " . $e->getMessage();
		}
	}else{
		$_SESSION['notify'] = ['error','Het bestand mag niet groter zijn dan 2MB en moet een .png, .jpg, .gif of .jpeg extentie hebben. probeer opnieuw. '];
		header("Location: ../profiel/");
	}
}else{
	$_SESSION['notify'] = ['login','u moet eerst inloggen. '];
	header("Location: ../login/");
}
