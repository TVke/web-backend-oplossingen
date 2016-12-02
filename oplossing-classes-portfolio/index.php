<?php $titel="Classes-portfolio";

spl_autoload_register(function(){
	include("classes/siteBuilder.php");
});


$home = new siteBuilder("header.html","body.html","footer.html");

$styles = $home->buildHeader();
$scripts = $home->buildFooter();

require("header.html");
require("body.html");
require("footer.html");