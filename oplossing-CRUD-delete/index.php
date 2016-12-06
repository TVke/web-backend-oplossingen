<?php $titel = "CRUD-delete";
$ownStyle = "delete.css";
try {
	$db = new pdo('mysql:host=localhost;dbname=bieren', 'root', 'root');
	if ($db) {

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