<?php
$titel = "regular-expressions";

if(isset($_POST['check'])){
	$_POST['resultaat']=preg_replace($_POST['test'],"#",$_POST['text']);
}

require("../generalheader.html");
require("body.php");
require("../generalfooter.html");