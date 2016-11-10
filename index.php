<?php
$titel="Web-backend";
$ownStyle="oplossingen.css";

$lijst = [];
$linkLijst = [];

foreach (scandir(".") as $dir)
{
	if(strpos($dir,".") === false){
		$linkLijst[filemtime($dir)] = $dir;
		$lijst[filemtime($dir)] = str_replace(array("oplossing-","-"),array(""," "),$dir);
	}
}

krsort($lijst);
krsort($linkLijst);


require("generalheader.html");
require("body.html");
require("generalfooter.html");