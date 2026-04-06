<?php
include "../config/auth.php";
include "../config/admin_only.php";
include "../config/koneksi.php";

if ($_SESSION['role'] != 'admin') {
    echo "Akses ditolak!";
    exit;
}

$id = intval($_GET['id']);
mysqli_query($conn, "DELETE FROM artikel WHERE id='$id'");

header("Location: artikel.php");
?>