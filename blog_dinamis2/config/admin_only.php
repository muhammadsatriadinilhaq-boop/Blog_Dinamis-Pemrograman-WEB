<?php
include "auth.php";

if($_SESSION['role'] != 'admin'){
    header("Location: ../user/index.php");
    exit;
}
?>