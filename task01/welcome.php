<?php
session_start(); 

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");  
    exit();
}

echo "<h1>Welcome</h1> " . $_SESSION['username']; 
?>
