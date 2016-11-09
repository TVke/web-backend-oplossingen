<?php $titel="Classes";

spl_autoload_register(function(){
	include("classes/Percent.php");
});

$firstNumber=150;
$secondNumber=100;

$percent = new Percent($firstNumber,$secondNumber);
$question = "Hoeveel procent is ".$firstNumber." van ".$secondNumber."?";

require("../generalheader.html");
require("body.html");
require("../generalfooter.html");