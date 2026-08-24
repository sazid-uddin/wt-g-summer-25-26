<?php
// Entry Point / Router
session_start();

if (isset($_SESSION['username'])) {
	// header("Location: ./view/home.php");
	require_once(__DIR__ . '/view/home.php');
} else {
	require_once(__DIR__ . '/view/login.php');
	// /htdocs/wtg/final/lab4/mvc + /view/login.php
	// header("Location: ./view/login.php");
}
?>