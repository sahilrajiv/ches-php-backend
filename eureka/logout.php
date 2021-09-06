<?php # Script 18.9 - logout.php
// This is the logout page for the site.
$p_title = 'Logout | Eureka';
include ('./header.php');

// If no first_name session variable exists, redirect the user:
if (!isset($_SESSION['id'])) {

	$url = 'https://eureka.ches.in/index.php'; // Define the URL.
	ob_end_clean(); // Delete the buffer.
	header("Location: $url");
	exit(); // Quit the script.
	
} else { // Log out the user.

	$_SESSION = array(); // Destroy the variables.
	session_destroy(); // Destroy the session itself.
	setcookie (session_name(), '', time()-3600); // Destroy the cookie.
	
	$url = 'https://eureka.ches.in/login.php'; // Define the URL.
	header("Location: $url");
	exit(); // Quit the script.
}

// Print a customized message:

?>