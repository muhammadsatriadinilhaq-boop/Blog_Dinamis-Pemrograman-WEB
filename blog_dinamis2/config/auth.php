<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

// CEK LOGIN
if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}
?>