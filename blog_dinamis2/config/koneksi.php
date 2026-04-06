<?php
$conn = mysqli_connect("localhost","root","","blog_db2");

if(!$conn){
    die("Koneksi gagal: ".mysqli_connect_error());
}
?>