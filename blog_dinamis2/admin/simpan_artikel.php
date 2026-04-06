<?php
include "../config/auth.php";
include "../config/admin_only.php";
include "../config/koneksi.php";

$judul = htmlspecialchars($_POST['judul']);
$isi = htmlspecialchars($_POST['isi']);
$kategori = $_POST['kategori'];
$user = $_SESSION['id_user'];

mysqli_query($conn, "
INSERT INTO artikel (judul, isi, id_kategori, id_user, tanggal)
VALUES ('$judul','$isi','$kategori','$user',NOW())
");

header("Location: artikel.php");
?>