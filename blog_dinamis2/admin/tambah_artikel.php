<?php
include "../config/auth.php";
include "../config/admin_only.php";
include "../config/koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
<title>Tambah Artikel</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: #f5f6fa;
}

.navbar {
    border-radius: 0 0 15px 15px;
}

.card {
    border-radius: 15px;
    border: none;
}

textarea {
    min-height: 150px;
}

.tag-box {
    max-height: 150px;
    overflow-y: auto;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 10px;
}
</style>

</head>

<body class="d-flex flex-column min-vh-100">

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark shadow">
<div class="container">
<span class="navbar-brand fw-bold">➕ Tambah Artikel</span>

<a href="artikel.php" class="btn btn-light btn-sm">← Kembali</a>
</div>
</nav>

<div class="container mt-4">

<div class="card p-4 shadow">

<h4 class="mb-4">Form Tambah Artikel</h4>

<form method="POST" action="simpan_artikel.php" enctype="multipart/form-data">

<div class="row">

<!-- KIRI -->
<div class="col-md-8">

<div class="mb-3">
<label class="form-label">Judul Artikel</label>
<input type="text" name="judul" class="form-control" placeholder="Masukkan judul..." required>
</div>

<div class="mb-3">
<label class="form-label">Isi Artikel</label>
<textarea name="isi" class="form-control" placeholder="Tulis isi artikel..." required></textarea>
</div>

</div>

<!-- KANAN -->
<div class="col-md-4">

<div class="mb-3">
<label class="form-label">Kategori</label>
<select name="kategori" class="form-select" required>
<option value="">-- Pilih Kategori --</option>
<?php
$k = mysqli_query($conn,"SELECT * FROM kategori");
while($d = mysqli_fetch_array($k)){
echo "<option value='$d[id]'>$d[nama_kategori]</option>";
}
?>
</select>
</div>

<div class="mb-3">
<label class="form-label">Tag</label>

<div class="tag-box">
<?php
$t = mysqli_query($conn,"SELECT * FROM tag");
while($d = mysqli_fetch_array($t)){
echo "
<div class='form-check'>
<input class='form-check-input' type='checkbox' name='tag[]' value='$d[id]'>
<label class='form-check-label'>$d[nama_tag]</label>
</div>
";
}
?>
</div>

</div>

</div>

</div>

<button class="btn btn-primary mt-3"> Simpan Artikel</button>

</form>

</div>

</div>

<div style="height: 60px;"></div>

<?php include "../assets/footer.php"; ?>

</body>
</html>