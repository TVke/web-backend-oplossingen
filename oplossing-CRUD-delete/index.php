<?php $titel = "CRUD-delete";
$ownStyle = "delete.css";
try {
	$db = new pdo('mysql:host=127.0.0.1;dbname=bieren', 'root', 'root');
	if ($db) {
		if (isset($_POST['delete'])){
			$question = $_POST['delete'];
		}
		if (isset($_POST['ja'])){
			$deleteBrewer = $db -> prepare("DELETE FROM brouwers WHERE brouwernr = :toDeleteBrewer");
			$deleteBrewer->bindParam(':toDeleteBrewer',$_POST['confirm']);
			if($deleteBrewer->execute()){
				$succes = "De datarij werd goed verwijderd. ";
			}else{
				$succes = "De datarij kon niet verwijderd worden. Probeer opnieuw. ";
			}
		}
		$allBrewers=$db->query("SELECT * FROM brouwers");
		if (!$allBrewers) {
			throw new Exception('de query. Kijk de tabelnamen na van "$allBrewers". ');
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
