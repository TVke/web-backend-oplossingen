<?php session_start();

if(isset($_POST['add'])) {
	$_SESSION['titel'] = $_POST['titel'];
	$_SESSION['article'] = $_POST['article'];
	$_SESSION['keywords'] = $_POST['kernwoorden'];
	$_SESSION['datum'] = $_POST['datum'];
	try {
		$db = new pdo('mysql:host=127.0.0.1;dbname=opdracht-security-login', 'root', 'root');
		if ($db) {
			$keywords = explode(",",$_SESSION['keywords']);
			for ($i=0,$ilen=count($keywords);$i<$ilen;++$i){
				trim($keywords[$i]);
				if($keywords[$i]==""){
					array_splice($keywords,$i,1);
				}
			}
			$date = explode("-",$_SESSION['datum']);
			$datum = $date[2]."-".$date[1]."-".$date[0];

			$fullQuery="		INSERT INTO artikels(titel,artikel,datum) VALUES (:titel,:article,:datum);";
			for ($i=0,$ilen=count($_SESSION['keywords']);$i<$ilen;++$i){
				$fullQuery.="	INSERT INTO kernwoorden (kernwoorden) VALUES (:keyword".$i.");
								INSERT INTO kernwoorden_linken (artikel_id, kernwoord_id) VALUES ((SELECT id FROM artikels WHERE datum = :datum),(SELECT id FROM kernwoorden WHERE kernwoorden = :keyword".$i."));";
			}
			$newArticle = $db->prepare($fullQuery);
			$newArticle->bindParam(':titel',$_SESSION['titel']);
			$newArticle->bindParam(':article',$_SESSION['article']);
			for ($i=0,$ilen=count($keywords);$i<$ilen;++$i) {
				$newArticle->bindParam(":keyword".$i, $keywords[$i]);
			}
			$newArticle->bindParam(':datum',$datum);
			if($newArticle->execute()){
				$_SESSION['notify'] = ['add','Het artikel werd succesvol toegevoegd '];
				header("Location: ../");
			}else{
				$_SESSION['notify'] = ['error','Er liep iets mis bij het toevoegen. Probeer opnieuw '];
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
