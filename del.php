<?php
// Start or resume the session
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Optionally, you can redirect the user to another page after destroying the session
 
exit; // Make sure to exit after redirecting
?>
