<?php
// require_once('connect_nikah.php');

ob_start();
session_start();

// Clear the session data
session_unset();

// Destroy the session
session_destroy();

// Redirect the user to the login page
header("Location:../outlog.php");

exit;
?>
