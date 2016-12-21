<?php session_start();
$titel = "mod-rewrite-blog";
$ownStyle = "../artikels.css";


require("../../generalheader.html");
require("body.php");
require("../../generalfooter.html");

unset($_SESSION['notify']);