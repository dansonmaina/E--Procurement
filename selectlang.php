<?php 
session_start();
$_SESSION['lang'] = $_GET['language'];
//logged in return to index page
//header('Location: index.php');
//exit;

$page = $_SERVER['PHP_SELF'];
$sec = "10";
header("Refresh: $sec; url=$page");
?>