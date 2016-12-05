<?php $titel = "CRUD-query";
try {
	$db = new pdo('mysql:host=localhost;dbname=bieren', 'root', 'root');
	if ($db) {
		$biers = $db->query("
			SELECT bi.biernr,bi.naam,bi.alcohol,br.brnaam,br.adres,br.postcode,br.gemeente,br.omzet 
			FROM bieren bi JOIN brouwers br ON(bi.brouwernr = br.brouwernr) 
			WHERE bi.naam LIKE 'du%' AND br.brnaam LIKE '%a%'
		");
		$brouwers = $db->query("SELECT brouwernr,brnaam FROM brouwers");
		if (!$biers) {
			throw new Exception('de query. Kijk de tabelnamen na van "$biers". ');
		}
		if (!$brouwers) {
			throw new Exception('de query. Kijk de tabelnamen na van "$brouwers". ');
		}
		if(isset($_GET['brouwerijen'])) {
			$showBiers = $db->prepare("SELECT bi.naam FROM bieren bi JOIN brouwers br ON(bi.brouwernr = br.brouwernr) WHERE br.brouwernr = :brouwerId");
			$showBiers->bindValue(':brouwerId', $_GET['brouwerijen']);
			$showBiers->execute();
			if(!$showBiers){
				throw new Exception('het voorbereiden van de query. Kijk de tabelnamen na van "$showBiers". ');
			}
			$showBrouwer = $db->prepare("SELECT brnaam FROM brouwers WHERE brouwernr = :brouwerId");
			$showBrouwer->bindValue(':brouwerId', $_GET['brouwerijen']);
			$showBrouwer->execute();
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