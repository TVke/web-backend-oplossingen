<?php $titel="Classes-extends";

spl_autoload_register(function(){
	include("classes/Animals.php");
	include("classes/Zebra.php");
	include("classes/Lion.php");
});

$dieren = [];
$leeuwen=[];
$zebras=[];

$dieren[0]=new Animals("flip","male","150");
$dieren[1]=new Animals("flup","female","100");
$dieren[2]=new Animals("flap","male","200");

$leeuwen[0]=new Lion("mi","male","10","Congo lion");
$leeuwen[1]=new Lion("auw","female","1","Kenia lion");

$zebras[0]=new Zebra("ze","male","200","Quagga");
$zebras[1]=new Zebra("ppy","male","200","Selous");

require("../generalheader.html");
require("body.html");
require("../generalfooter.html");