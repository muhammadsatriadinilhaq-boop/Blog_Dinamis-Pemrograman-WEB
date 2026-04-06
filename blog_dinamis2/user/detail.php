<?php
include "../config/koneksi.php";
include "../config/author_only.php";

$id = intval($_GET['id']);

$data = mysqli_query($conn,"
SELECT artikel.*, kategori.nama_kategori 
FROM artikel 
JOIN kategori ON artikel.id_kategori = kategori.id
WHERE artikel.id='$id'
");

$d = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html>
<head>
<title><?= htmlspecialchars($d['judul']); ?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body { background: #f5f6fa; }

.card {
    border-radius: 15px;
    border: none;
}

.tag {
    background: #4e73df;
    color: white;
    padding: 5px 10px;
    border-radius: 10px;
    font-size: 12px;
    margin-right: 5px;
}
</style>
</head>

<body class="d-flex flex-column min-vh-100">

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark shadow">
<div class="container">
<span class="navbar-brand fw-bold">📰 Blog Dinamis</span>
</div>
</nav>

<div class="container mt-4">

<a href="index.php" class="btn btn-secondary mb-3">← Kembali</a>

<div class="card shadow p-4">

<h2><?= htmlspecialchars($d['judul']); ?></h2>

<p class="text-muted">
Kategori: <?= $d['nama_kategori']; ?>
</p>

<hr>

<p style="line-height:1.8">
<?= nl2br(htmlspecialchars($d['isi'])); ?>
</p>

<hr>

<!-- TAG -->
<h6>Tag:</h6>
<?php
$t = mysqli_query($conn,"
SELECT tag.nama_tag FROM artikel_tag 
JOIN tag ON artikel_tag.id_tag = tag.id
WHERE artikel_tag.id_artikel='$id'
");

while($tag = mysqli_fetch_array($t)){
echo "<span class='tag'>$tag[nama_tag]</span>";
}
?>

</div>

<hr>

<!-- KOMENTAR -->
<h4>Komentar</h4>

<form method="POST" action="komentar.php">
<input type="hidden" name="id_artikel" value="<?= $id; ?>">

<input type="text" name="nama" class="form-control mb-2" placeholder="Nama" required>

<textarea name="isi" class="form-control mb-2" placeholder="Komentar..." required></textarea>

<button class="btn btn-primary">Kirim</button>
</form>

<hr>

<?php
$komentar = mysqli_query($conn,"
SELECT * FROM komentar 
WHERE id_artikel='$id'
ORDER BY id DESC
");

while($k = mysqli_fetch_array($komentar)){
?>

<div class="card mb-2 shadow-sm">
<div class="card-body">
<strong><?= htmlspecialchars($k['nama']); ?></strong>
<p><?= htmlspecialchars($k['isi']); ?></p>
<small class="text-muted"><?= $k['tanggal']; ?></small>
</div>
</div>

<?php } ?>

</div>

<div style="height: 60px;"></div>

<?php include "../assets/footer.php"; ?>

</body>
</html>