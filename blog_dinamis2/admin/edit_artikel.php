<?php
include "../config/auth.php";
include "../config/admin_only.php";
include "../config/koneksi.php";

$id = intval($_GET['id']);
$d = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM artikel WHERE id='$id'"));
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Artikel</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: #f5f6fa;
}

.card {
    border-radius: 15px;
    border: none;
}

.btn {
    border-radius: 10px;
}

textarea {
    min-height: 150px;
}
</style>
</head>

<body class="d-flex flex-column min-vh-100">

<div class="container mt-4">

<!-- HEADER -->
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>✏️ Edit Artikel</h4>
    <a href="artikel.php" class="btn btn-secondary">← Kembali</a>
</div>

<!-- CARD FORM -->
<div class="card p-4 shadow">

<form method="POST" action="update_artikel.php">

<input type="hidden" name="id" value="<?= $d['id']; ?>">

<!-- JUDUL -->
<div class="mb-3">
    <label class="form-label">Judul Artikel</label>
    <input type="text" name="judul" 
           value="<?= htmlspecialchars($d['judul']); ?>" 
           class="form-control" required>
</div>

<!-- ISI -->
<div class="mb-3">
    <label class="form-label">Isi Artikel</label>
    <textarea name="isi" class="form-control" required><?= htmlspecialchars($d['isi']); ?></textarea>
</div>

<!-- BUTTON -->
<div class="d-flex justify-content-end">
    <button class="btn btn-warning">
        Update Artikel
    </button>
</div>

</form>

</div>

</div>

<div style="height: 60px;"></div>

<?php include "../assets/footer.php"; ?>

</body>
</html>