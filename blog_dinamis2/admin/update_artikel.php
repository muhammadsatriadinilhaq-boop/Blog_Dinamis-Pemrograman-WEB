<?php
include "../config/auth.php";
include "../config/admin_only.php";
include "../config/koneksi.php";

$id = $_POST['id'];
$judul = $_POST['judul'];
$isi = $_POST['isi'];

mysqli_query($conn, "UPDATE artikel SET judul='$judul', isi='$isi' WHERE id='$id'");

header("Location: artikel.php");
?>