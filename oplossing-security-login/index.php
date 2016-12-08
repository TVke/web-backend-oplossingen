<?php $titel = "security-login";
$ownStyle="login.css";

session_start();

if (isset($_COOKIE['login'])){
	header("Location: dashboard.php");
}else {
	require("../generalheader.html");
	require("body.php");
	require("../generalfooter.html");

	session_unset();
	setcookie('login', "", 1);
	setcookie('login', false);
	unset($_COOKIE['login']);
}