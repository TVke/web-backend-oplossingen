<?php $titel="Classes";

function loadClasses(){
	include("classes/Percent.php");
}
spl_autoload_register('loadClasses');

$firstNumber=150;
$secondNumber=100;

$percent = new Percent($firstNumber,$secondNumber);
$question = "Hoeveel procent is ".$firstNumber." van ".$secondNumber."?";

require("../generalheader.html");
require("body.html");
require("../generalfooter.html");