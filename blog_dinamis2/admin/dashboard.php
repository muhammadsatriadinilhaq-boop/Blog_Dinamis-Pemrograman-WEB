<?php 
include "../config/auth.php";
include "../config/admin_only.php";
include "../config/koneksi.php";

$a = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM artikel"));
$k = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM kategori"));
$u = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM users"));
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

<style>
body {
    background: #f5f6fa;
}

.navbar {
    border-radius: 0 0 15px 15px;
}

.card {
    border: none;
    border-radius: 15px;
    color: white;
}

.card i {
    font-size: 30px;
}

.stat-card {
    padding: 20px;
    transition: 0.3s;
}

.stat-card:hover {
    transform: translateY(-5px);
}

.bg-artikel {
    background: linear-gradient(135deg, #4e73df, #224abe);
}

.bg-kategori {
    background: linear-gradient(135deg, #1cc88a, #13855c);
}

.bg-user {
    background: linear-gradient(135deg, #f6c23e, #dda20a);
}

.menu-btn {
    border-radius: 10px;
    padding: 10px 20px;
}
</style>

</head>

<body class="d-flex flex-column min-vh-100">

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark shadow">
<div class="container">
<span class="navbar-brand fw-bold">Dashboard</span>

<span class="text-white">
Halo, <?= $_SESSION['role']; ?>
</span>
</div>
</nav>

<div class="container mt-4">



<!-- MENU -->
<div class="mb-4">
<a href="artikel.php" class="btn btn-primary menu-btn">Artikel</a>
<a href="kategori.php" class="btn btn-success menu-btn">Kategori</a>
<a href="tag.php" class="btn btn-info menu-btn">Tag</a>
<a href="../auth/logout.php" class="btn btn-danger menu-btn">Logout</a>
</div>

<!-- STATISTIK -->
<div class="row">

<div class="col-md-4">
<div class="card stat-card bg-artikel shadow">
<div class="d-flex justify-content-between align-items-center">
<div>
<h2><?= $a ?></h2>
<p>Total Artikel</p>
</div>
<i class="fas fa-newspaper"></i>
</div>
</div>
</div>

<div class="col-md-4">
<div class="card stat-card bg-kategori shadow">
<div class="d-flex justify-content-between align-items-center">
<div>
<h2><?= $k ?></h2>
<p>Total Kategori</p>
</div>
<i class="fas fa-folder"></i>
</div>
</div>
</div>

<div class="col-md-4">
<div class="card stat-card bg-user shadow">
<div class="d-flex justify-content-between align-items-center">
<div>
<h2><?= $u ?></h2>
<p>Total User</p>
</div>
<i class="fas fa-users"></i>
</div>
</div>
</div>

</div>

</div>

<div style="height: 60px;"></div>

<?php include "../assets/footer.php"; ?>

</body>
</html>