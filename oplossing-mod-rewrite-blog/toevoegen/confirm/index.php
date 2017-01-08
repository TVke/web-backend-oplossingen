<?php session_start();

if (isset($_POST['add'])){
	$_SESSION['titel'] = $_POST['titel'];
	$_SESSION['artikel'] = $_POST['artikel'];
	$_SESSION['kernwoorden'] = $_POST['kernwoorden'];
	$_SESSION['datum'] = $_POST['datum'];
	try{
		$db = new pdo('mysql:host=127.0.0.1;dbname=oplossingen', 'root', 'root');
		if ($db) {
			$_SESSION['datum'];
			$dateParts = explode("-",$_SESSION['datum']);
			if($dateParts[0]!==""){
				$date = $dateParts[2]."-".$dateParts[1]."-".$dateParts[0];
				$addarticle = $db -> prepare("INSERT INTO artikels VALUES (NULL,:titel,:artikel,:datum)");
				$addarticle ->bindValue(':datum',$date);
			}else{
				$addarticle = $db -> prepare("INSERT INTO artikels VALUES (NULL,:titel,:artikel,CURRENT_DATE())");
			}
			$addarticle ->bindValue(":titel",$_SESSION['titel']);
			$addarticle ->bindValue(":artikel",$_SESSION['artikel']);
			if($addarticle->execute()){
				$id = $db->lastInsertId();
				$kernwoorden = explode(",",$_SESSION['kernwoorden']);
				for ($i=0,$ilen=count($kernwoorden);$i<$ilen;++$i){
					$kernwoorden[$i] = trim($kernwoorden[$i]);
					if($kernwoorden[$i]!==""){
						$addword = $db -> prepare("INSERT INTO kernwoorden VALUES (NULL,:woord,:artikelId)");
						$addword ->bindValue(":woord",$kernwoorden[$i]);
						$addword ->bindValue(":artikelId",$id);
						$addword->execute();
					}
				}
				unset($_SESSION['titel']);
				unset($_SESSION['artikel']);
				unset($_SESSION['kernwoorden']);
				unset($_SESSION['datum']);
				$_SESSION['notify'] = "Het toevoegen is gelukt. ";
				header("Location: ../../");
			}else{
				$_SESSION['notify'] = "Het toevoegen is mislukt. ";
				header("Location: ../");
			}
		}else{
			throw new Exception("Het toevoegen is mislukt. ");
		}
	}catch (Exception $m){
		$_SESSION['notify'] = $m;
		header("Location: ../");
	}
}else{
	$_SESSION['titel']="";
	$_SESSION['artikel']="";
	$_SESSION['kernwoorden']="";
	$_SESSION['datum']="";
	unset($_SESSION['notify']);
	header("Location: ../../");
}