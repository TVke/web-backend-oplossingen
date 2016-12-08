<?php session_start();

setcookie('login',"",1);
setcookie('login',false);
unset($_COOKIE['login']);
$_SESSION['email'] = "";
$_SESSION['password'] = "";
$_SESSION['notify'] = ['login','U bent uitgelogd. Tot de volgende keer. '];
header("Location: login.php");