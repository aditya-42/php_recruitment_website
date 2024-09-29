<?php
session_start();

// Destroy the session to log the user out
session_unset(); // Clear all session variables
session_destroy(); // Destroy the session

// Redirect to the login page or home page
header('Location: login.php');
exit();
?>
