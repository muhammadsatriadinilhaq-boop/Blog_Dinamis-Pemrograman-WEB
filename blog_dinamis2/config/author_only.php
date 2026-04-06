<?php
include "auth.php";

if($_SESSION['role'] != 'author'){
    header("Location: ../admin/dashboard.php");
    exit;
}
?>