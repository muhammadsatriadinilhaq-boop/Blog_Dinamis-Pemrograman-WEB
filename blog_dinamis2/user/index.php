<?php 
include "../config/auth.php";
include "../config/author_only.php";
include "../config/koneksi.php";

// =======================
// KONFIG PAGINATION
// =======================
$limit = 4;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

// =======================
// SEARCH
// =======================
$cari = $_GET['cari'] ?? '';

// =======================
// SORTING
// =======================
$sort = $_GET['sort'] ?? 'terbaru';

$order = ($sort == 'terlama') 
    ? "ORDER BY artikel.id ASC" 
    : "ORDER BY artikel.id DESC";

// =======================
// TOTAL DATA
// =======================
$total = mysqli_query($conn,"
SELECT COUNT(*) as total 
FROM artikel 
WHERE judul LIKE '%$cari%'
");

$totalData = mysqli_fetch_assoc($total)['total'];
$totalPage = ceil($totalData / $limit);

// =======================
// QUERY DATA
// =======================
$data = mysqli_query($conn,"
SELECT artikel.*, kategori.nama_kategori 
FROM artikel 
JOIN kategori ON artikel.id_kategori = kategori.id
WHERE judul LIKE '%$cari%'
$order
LIMIT $start, $limit
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Blog Dinamis</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body { background: #f5f6fa; }

.navbar { border-radius: 0 0 15px 15px; }

.hero {
    background: linear-gradient(135deg, #4e73df, #1cc88a);
    color: white;
    padding: 40px;
    border-radius: 15px;
    margin-bottom: 20px;
}

.card {
    border: none;
    border-radius: 15px;
}

.card:hover {
    transform: translateY(-5px);
    transition: 0.3s;
}

.sidebar {
    background: white;
    padding: 15px;
    border-radius: 15px;
}
</style>
</head>

<body class="d-flex flex-column min-vh-100">

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark shadow">
<div class="container d-flex justify-content-between">

<span class="navbar-brand fw-bold">📰 Blog Dinamis</span>

<!-- TOMBOL LOGOUT -->
<a href="../auth/logout.php" class="btn btn-danger btn-sm">
    Logout
</a>

</div>
</nav>

<div class="container mt-4 flex-grow-1">

<!-- HERO -->
<div class="hero shadow">
    <h2>Selamat Datang di Blog Dinamis</h2>
    <p>Tempat berbagi artikel menarik 🚀</p>
</div>

<!-- SEARCH + SORT -->
<div class="row mb-4">

<div class="col-md-8">
<form method="GET">
<input type="text" name="cari" 
       class="form-control" 
       placeholder="Cari artikel..."
       value="<?= htmlspecialchars($cari) ?>">
</div>

<div class="col-md-4">
<select name="sort" class="form-select" onchange="this.form.submit()">
    <option value="terbaru" <?= $sort=='terbaru'?'selected':'' ?>>Terbaru</option>
    <option value="terlama" <?= $sort=='terlama'?'selected':'' ?>>Terlama</option>
</select>
</form>
</div>

</div>

<div class="row">

<!-- KONTEN -->
<div class="col-md-8">
<div class="row">

<?php while($d = mysqli_fetch_array($data)){ ?>

<div class="col-md-6">
<div class="card mb-4 shadow">

<div class="card-body">
<h5><?= htmlspecialchars($d['judul']); ?></h5>

<small class="text-muted">
<?= $d['nama_kategori']; ?>
</small>

<p class="mt-2">
<?= substr(strip_tags($d['isi']),0,100); ?>...
</p>

<a href="detail.php?id=<?= $d['id']; ?>" 
   class="btn btn-primary btn-sm">
   Baca Selengkapnya
</a>

</div>
</div>
</div>

<?php } ?>

</div>

<!-- PAGINATION -->
<nav>
<ul class="pagination justify-content-center">

<?php for($i=1; $i<=$totalPage; $i++){ ?>
<li class="page-item <?= ($i==$page)?'active':'' ?>">
<a class="page-link" 
   href="?page=<?= $i ?>&cari=<?= $cari ?>&sort=<?= $sort ?>">
   <?= $i ?>
</a>
</li>
<?php } ?>

</ul>
</nav>

</div>

<!-- SIDEBAR -->
<div class="col-md-4">

<div class="sidebar shadow mb-3">
<h5>Kategori</h5>
<ul>
<?php
$k = mysqli_query($conn,"SELECT * FROM kategori");
while($x = mysqli_fetch_array($k)){
echo "<li>$x[nama_kategori]</li>";
}
?>
</ul>
</div>

<div class="sidebar shadow">
<h5>Artikel Terbaru</h5>
<ul>
<?php
$l = mysqli_query($conn,"SELECT * FROM artikel ORDER BY id DESC LIMIT 5");
while($x = mysqli_fetch_array($l)){
echo "<li><a href='detail.php?id=$x[id]'>$x[judul]</a></li>";
}
?>
</ul>
</div>

</div>

</div>
</div>

<div style="height: 60px;"></div>
<?php include "../assets/footer.php"; ?>

</body>
</html>