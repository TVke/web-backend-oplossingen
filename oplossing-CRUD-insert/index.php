<?php $titel = "CRUD-insert";
try {
	$db = new pdo('mysql:host=localhost;dbname=bieren', 'root', 'root');
	if ($db) {
		if(isset($_POST['submit'])) {
			$newBrewer = $db->prepare("INSERT INTO brouwers VALUES (NULL,:brnaam,:adres,:postcode,:gemeente,:omzet)");
			$newBrewer->bindParam(':brnaam',$_POST['brnaam']);
			$newBrewer->bindParam(':adres',$_POST['adres']);
			$newBrewer->bindParam(':postcode',$_POST['postcode']);
			$newBrewer->bindParam(':gemeente',$_POST['gemeente']);
			$newBrewer->bindParam(':omzet',$_POST['omzet']);
			if($newBrewer->execute()){
				$succes = "Brouwerij succesvol toegevoegd. Het unieke nummer van deze brouwerij is ".$db->lastInsertId();
			}else{
				throw new Exception('het toevoegen. Probeer opnieuw. ');
			}
		}
	} else {
		throw new Exception('de database, ze kon niet worden geladen. ');
	}
}
catch(Exception $e) {
	echo "Er liep iets mis met " . $e->getMessage();
}
require("../generalheader.html");
require("body.php");
require("../generalfooter.html");