<?php $titel="Classes-extends";

spl_autoload_register(function(){
	include("classes/Animals.php");
});

require("../generalheader.html");
require("body.html");
require("../generalfooter.html");