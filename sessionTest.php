<?php
$user_name = "haji"; 
session_start();
if(isset($_SESSION["username"])) {
    $user_name = $_SESSION["username"];
}

echo $user_name; // Move this line outside of the else block
?>
