<?php
include "../config/auth.php";
include "../config/admin_only.php";
include "../config/koneksi.php";

$id_user = $_SESSION['id_user'];
$role = $_SESSION['role'];

/* =======================
   PAGINATION + SORT
======================= */
$batas = 5;
$page = $_GET['page'] ?? 1;
$start = ($page - 1) * $batas;

$order = $_GET['order'] ?? 'DESC';

/* =======================
   QUERY BERDASARKAN ROLE
======================= */
if($role == 'admin'){
    $total_q = "SELECT COUNT(*) as total FROM artikel";
    $q = "SELECT * FROM artikel ORDER BY id $order LIMIT $start,$batas";
}else{
    $total_q = "SELECT COUNT(*) as total FROM artikel WHERE id_user='$id_user'";
    $q = "SELECT * FROM artikel WHERE id_user='$id_user' ORDER BY id $order LIMIT $start,$batas";
}

$total_data = mysqli_fetch_assoc(mysqli_query($conn,$total_q))['total'];
$total_page = ceil($total_data / $batas);

$data = mysqli_query($conn,$q);
?>

<!DOCTYPE html>
<html>
<head>
<title>Data Artikel</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body { background: #f5f6fa; }

.card {
    border-radius: 15px;
    border: none;
}

.btn { border-radius: 10px; }

.table th {
    background: #f1f1f1;
}
</style>

</head>

<body class="d-flex flex-column min-vh-100">

<div class="container mt-4">

<div class="card p-4 shadow">

<div class="d-flex justify-content-between align-items-center mb-3">

<h4>📰 Data Artikel</h4>

<!-- SORT -->
<form method="GET">
<select name="order" onchange="this.form.submit()" class="form-select form-select-sm">
<option value="DESC" <?= ($order=='DESC')?'selected':'' ?>>Terbaru</option>
<option value="ASC" <?= ($order=='ASC')?'selected':'' ?>>Terlama</option>
</select>
</form>

</div>

<!-- TOMBOL -->
<div class="mb-3">
<a href="dashboard.php" class="btn btn-secondary">← Kembali</a>
<a href="tambah_artikel.php" class="btn btn-primary ms-2">+ Tambah</a>
</div>

<!-- SEARCH (TIDAK DIUBAH) -->
<input type="text" id="searchArtikel" class="form-control mb-3" placeholder="Cari judul artikel...">

<table class="table table-hover align-middle">
<thead>
<tr>
<th>No</th>
<th>Judul</th>
<th>Aksi</th>
</tr>
</thead>

<tbody id="artikelTable">

<?php 
$no = $start + 1;
while($d=mysqli_fetch_array($data)){ 
?>

<tr>

<td><?= $no++ ?></td>

<td><?= htmlspecialchars($d['judul']) ?></td>

<td>
<a href="edit_artikel.php?id=<?= $d['id'] ?>" class="btn btn-warning btn-sm">Edit</a>

<a href="hapus_artikel.php?id=<?= $d['id'] ?>" 
   class="btn btn-danger btn-sm"
   onclick="return confirm('Yakin hapus?')">
   Hapus
</a>
</td>

</tr>

<?php } ?>

</tbody>
</table>

<!-- PAGINATION -->
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

<!-- SEARCH JS (TETAP) -->
<script>
const searchInput = document.getElementById('searchArtikel');
const rows = document.querySelectorAll('#artikelTable tr');

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