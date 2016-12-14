<?php $titel = "CRUD-CMS";
$ownStyle="../CMS.css";

session_start();

if (isset($_COOKIE['login'])) {
	header("Location: ../");
}else {
	require("../../generalheader.html");
	require("body.php");
	require("../../generalfooter.html");

	session_unset();
	setcookie('login', "", 1,"/");
	setcookie('login', false);
	unset($_COOKIE['login']);
}