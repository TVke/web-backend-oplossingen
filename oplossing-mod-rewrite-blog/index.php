<?php session_start();

$titel="mod-rewrite-blog";
$ownStyle = "artikels.css";

try{
	$db = new pdo('mysql:host=127.0.0.1;dbname=oplossingen', 'root', 'root');
	if ($db) {
		$years = $db->query("SELECT DISTINCT YEAR(datum) year FROM artikels ORDER BY year DESC");

		if(isset($_GET['articles'])){
			if($_GET['year']===""){
				$articles = $db->query("SELECT id,titel,artikel,DATE_FORMAT(datum,'%d-%m-%Y') datum FROM artikels 
				WHERE titel LIKE '%".$_GET['articles']."%' OR artikel LIKE '%".$_GET['articles']."%'");
			}
			elseif ($_GET['articles']){
				$articles = $db->query("SELECT id,titel,artikel,DATE_FORMAT(datum,'%d-%m-%Y') datum FROM artikels 
				WHERE datum LIKE '".$_GET['year']."%'");
			}
			else{
				$articles = $db->query("SELECT id,titel,artikel,DATE_FORMAT(datum,'%d-%m-%Y') datum FROM artikels 
				WHERE (titel LIKE '%".$_GET['articles']."%' OR artikel LIKE '%".$_GET['articles']."%') AND datum LIKE '".$_GET['year']."%'");
			}
		}else{
			$articles = $db->query("SELECT id,titel,artikel,DATE_FORMAT(datum,'%d-%m-%Y') datum FROM artikels");
		}
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