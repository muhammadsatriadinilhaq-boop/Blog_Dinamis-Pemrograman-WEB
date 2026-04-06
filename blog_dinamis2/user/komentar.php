<?php
include "../config/koneksi.php";
include "../config/author_only.php";

$id = $_POST['id_artikel'];
$nama = htmlspecialchars($_POST['nama']);
$isi = htmlspecialchars($_POST['isi']);

mysqli_query($conn,"
INSERT INTO komentar 
VALUES(NULL,'$id','$nama','$isi',NOW())
");

header("Location: detail.php?id=$id");
?>