<?php session_start();

$titel="mod-rewrite-blog";
$ownStyle = "artikels.css";

try{
	$db = new pdo('mysql:host=127.0.0.1;dbname=oplossingen', 'root', 'root');
	if ($db) {
		$articles = $db->query("SELECT id,titel,artikel,DATE_FORMAT(datum,'%d-%m-%Y') datum FROM artikels");
		$years = $db->query("SELECT DISTINCT YEAR(datum) year FROM artikels ORDER BY year DESC");
	}else{
		throw new Exception("Het toevoegen is mislukt.");
	}
}catch (Exception $m){
	$_SESSION['notify'] = $m;
	header("Location: .");
}

require("../generalheader.html");
require("body.php");
require("../generalfooter.html");

unset($_SESSION['notify']);