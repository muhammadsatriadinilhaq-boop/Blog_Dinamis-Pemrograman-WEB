<?php
session_start();
include "../config/koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$data = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
$user = mysqli_fetch_assoc($data);

if ($user) {
    $_SESSION['login'] = true;
    $_SESSION['id_user'] = $user['id'];
    $_SESSION['role'] = $user['role'];

    // 🔥 REDIRECT BERDASARKAN ROLE
    if($user['role'] == 'admin'){
        header("Location: ../admin/dashboard.php");
    } else {
        header("Location: ../user/index.php");
    }
    exit;

} else {
    echo "Login gagal!";
}
?>