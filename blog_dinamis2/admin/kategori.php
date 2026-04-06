<?php
include "../config/auth.php";
include "../config/admin_only.php";
include "../config/koneksi.php";

/* =======================
   TAMBAH
======================= */
if(isset($_POST['kategori'])){
    $nama = htmlspecialchars($_POST['kategori']);
    mysqli_query($conn, "INSERT INTO kategori VALUES(NULL,'$nama')");
}

/* =======================
   UPDATE
======================= */
if(isset($_POST['update'])){
    $id = intval($_POST['id']);
    $nama = htmlspecialchars($_POST['nama_kategori']);
    mysqli_query($conn, "UPDATE kategori SET nama_kategori='$nama' WHERE id='$id'");
    header("Location: kategori.php");
}

/* =======================
   HAPUS
======================= */
if(isset($_GET['hapus'])){
    $id = intval($_GET['hapus']);
    mysqli_query($conn, "DELETE FROM kategori WHERE id='$id'");
    header("Location: kategori.php");
}

/* =======================
   PAGINATION + SORT
======================= */
$batas = 5;
$page = $_GET['page'] ?? 1;
$start = ($page - 1) * $batas;

// SORT DROPDOWN
$order = $_GET['order'] ?? 'DESC';

$total = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kategori"));
$total_page = ceil($total / $batas);

$data = mysqli_query($conn,"
SELECT * FROM kategori
ORDER BY id $order
LIMIT $start, $batas
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Kategori</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body { background: #f5f6fa; }

.card {
    border-radius: 15px;
    border: none;
}

.btn { border-radius: 10px; }
</style>
</head>

<body class="d-flex flex-column min-vh-100">

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark shadow">
<div class="container">
<span class="navbar-brand fw-bold">📂 Manajemen Kategori</span>
<a href="dashboard.php" class="btn btn-light btn-sm">← Dashboard</a>
</div>
</nav>

<div class="container mt-4">

<div class="row">

<!-- FORM -->
<div class="col-md-4">
<div class="card p-4 shadow">

<h5 class="mb-3">Tambah Kategori</h5>

<form method="POST">
<input type="text" name="kategori" class="form-control mb-3" required>
<button class="btn btn-success w-100">+ Tambah</button>
</form>

</div>
</div>

<!-- LIST -->
<div class="col-md-8">
<div class="card p-4 shadow">

<div class="d-flex justify-content-between mb-3">

<h5>Daftar Kategori</h5>

<!-- SORT DROPDOWN -->
<form method="GET">
<select name="order" onchange="this.form.submit()" class="form-select form-select-sm">
<option value="DESC" <?= ($order=='DESC')?'selected':'' ?>>Terbaru</option>
<option value="ASC" <?= ($order=='ASC')?'selected':'' ?>>Terlama</option>
</select>
</form>

</div>

<!-- SEARCH (TIDAK DIUBAH) -->
<input type="text" id="searchKategori" class="form-control mb-3" placeholder="Cari kategori...">

<table class="table table-hover">
<tr>
<th>No</th>
<th>Nama</th>
<th>Aksi</th>
</tr>

<tbody id="kategoriTable">

<?php 
$no = $start + 1;
while($d = mysqli_fetch_array($data)){ 
?>

<tr>

<?php if(isset($_GET['edit']) && $_GET['edit'] == $d['id']){ ?>

<!-- EDIT MODE -->
<form method="POST">
<td><?= $no++ ?></td>

<td>
<input type="text" name="nama_kategori" value="<?= htmlspecialchars($d['nama_kategori']) ?>" class="form-control">
<input type="hidden" name="id" value="<?= $d['id'] ?>">
</td>

<td>
<button name="update" class="btn btn-success btn-sm">Simpan</button>
<a href="kategori.php" class="btn btn-secondary btn-sm">Batal</a>
</td>
</form>

<?php } else { ?>

<td><?= $no++ ?></td>
<td><?= htmlspecialchars($d['nama_kategori']) ?></td>

<td>
<a href="?edit=<?= $d['id'] ?>&page=<?= $page ?>&order=<?= $order ?>" class="btn btn-warning btn-sm">Edit</a>

<a href="?hapus=<?= $d['id'] ?>" 
   class="btn btn-danger btn-sm"
   onclick="return confirm('Yakin hapus?')">
   Hapus
</a>
</td>

<?php } ?>

</tr>

<?php } ?>

</tbody>
</table>

<!-- PAGINATION MODEL PREV NEXT -->
<div class="d-flex justify-content-between mt-3">

<!-- PREV -->
<?php if($page > 1){ ?>
<a href="?page=<?= $page-1 ?>&order=<?= $order ?>" class="btn btn-outline-primary btn-sm">
← Prev
</a>
<?php } else { ?>
<span></span>
<?php } ?>

<!-- INFO -->
<span>Halaman <?= $page ?> dari <?= $total_page ?></span>

<!-- NEXT -->
<?php if($page < $total_page){ ?>
<a href="?page=<?= $page+1 ?>&order=<?= $order ?>" class="btn btn-outline-primary btn-sm">
Next →
</a>
<?php } ?>

</div>

</div>
</div>

</div>

</div>

<!-- SEARCH JS (TETAP) -->
<script>
const searchInput = document.getElementById('searchKategori');
const rows = document.querySelectorAll('#kategoriTable tr');

searchInput.addEventListener('keyup', function() {
    let keyword = this.value.toLowerCase();

    rows.forEach(row => {
        let text = row.innerText.toLowerCase();
        row.style.display = text.includes(keyword) ? '' : 'none';
    });
});
</script>

<div style="height: 60px;"></div>
<?php include "../assets/footer.php"; ?>

</body>
</html>