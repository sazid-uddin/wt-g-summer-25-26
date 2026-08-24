<?php
// Router
if ($_SESSION['username']) {
	// include...
} else {
	include './view/login.php';
}