<?php $titel = "CRUD-order by";
$ownStyle = "orderby.css";

$biernrA = true;
$naamA = true;
$brnaamA = true;
$soortA = true;
$alcoholA = true;

try {
	$db = new pdo('mysql:host=localhost;dbname=bieren', 'root', 'root');
	if ($db) {
		if (!isset($_GET['col'])){
			$allBiers=$db->query("SELECT * FROM bieren bi JOIN brouwers br ON (bi.brouwernr = br.brouwernr) JOIN soorten s ON (bi.soortnr = s.soortnr)");
		}else{
			$sort = explode("_",$_GET['col']);
			$allBiers=$db->query("SELECT * FROM bieren bi JOIN brouwers br ON (bi.brouwernr = br.brouwernr) JOIN soorten s ON (bi.soortnr = s.soortnr) ORDER BY ".$sort[0]." ".$sort[1]);
			switch ($sort[0]) {
				case "biernr":
					if($sort[1]=="DESC"){
						$biernrA = false;
					}else{
						$biernrA = true;
					}
					break;
				case "naam":
					if($sort[1]=="DESC"){
						$naamA = false;
					}else{
						$naamA = true;
					}
					break;
				case "brnaam":
					if($sort[1]=="DESC"){
						$brnaamA = false;
					}else{
						$brnaamA = true;
					}
					break;
				case "soort":
					if($sort[1]=="DESC"){
						$soortA = false;
					}else{
						$soortA = true;
					}
					break;
				case "alcohol":
					if($sort[1]=="DESC"){
						$alcoholA = false;
					}else{
						$alcoholA = true;
					}
					break;
			}
		}
		if (!$allBiers) {
			throw new Exception('de query. Kijk de tabelnamen na van "$allBiers". ');
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