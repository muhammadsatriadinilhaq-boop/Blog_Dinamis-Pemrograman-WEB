<?php
include "../config/auth.php";
include "../config/admin_only.php";
include "../config/koneksi.php";

// ================= TAMBAH =================
if(isset($_POST['tag'])){
    $nama = htmlspecialchars($_POST['tag']);
    mysqli_query($conn, "INSERT INTO tag VALUES(NULL,'$nama')");
}

// ================= UPDATE =================
if(isset($_POST['update'])){
    $id = intval($_POST['id']);
    $nama = htmlspecialchars($_POST['nama_tag']);
    mysqli_query($conn, "UPDATE tag SET nama_tag='$nama' WHERE id='$id'");
}

// ================= HAPUS =================
if(isset($_GET['hapus'])){
    $id = intval($_GET['hapus']);
    mysqli_query($conn, "DELETE FROM tag WHERE id='$id'");
    header("Location: tag.php");
}

// ================= SORTING =================
$sort = $_GET['sort'] ?? 'terbaru';
$order = ($sort == 'terlama') ? "ASC" : "DESC";

// ================= PAGINATION =================
$limit = 5;
$page = $_GET['page'] ?? 1;
$start = ($page - 1) * $limit;

$total = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tag"));
$pages = ceil($total / $limit);

// ================= DATA =================
$query = mysqli_query($conn, "SELECT * FROM tag ORDER BY id $order LIMIT $start,$limit");

// untuk suggestion (ambil semua)
$dataTagAll = mysqli_query($conn, "SELECT * FROM tag");
$tags = [];
while($row = mysqli_fetch_assoc($dataTagAll)){
    $tags[] = $row;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Tag</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body { background: #f5f6fa; }

.navbar { border-radius: 0 0 15px 15px; }

.card {
    border-radius: 15px;
    border: none;
}

.btn { border-radius: 10px; }

/* SEARCH DROPDOWN */
.suggestion-box {
    position: absolute;
    background: white;
    width: 100%;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    z-index: 999;
}

.suggestion-item {
    padding: 10px;
    cursor: pointer;
}

.suggestion-item:hover {
    background: #f1f1f1;
}
</style>
</head>

<body class="d-flex flex-column min-vh-100">

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark shadow">
<div class="container">
<span class="navbar-brand fw-bold">🏷️ Manajemen Tag</span>
<a href="dashboard.php" class="btn btn-light btn-sm">← Dashboard</a>
</div>
</nav>

<div class="container mt-4">
<div class="row">

<!-- FORM -->
<div class="col-md-4">
<div class="card p-4 shadow">

<h5 class="mb-3">Tambah Tag</h5>

<form method="POST">
<input type="text" name="tag" class="form-control mb-3" placeholder="Nama Tag" required>
<button class="btn btn-info w-100 text-white">+ Tambah</button>
</form>

</div>
</div>

<!-- LIST -->
<div class="col-md-8">
<div class="card p-4 shadow position-relative">

<h5 class="mb-3">Daftar Tag</h5>

<!-- SEARCH -->
<div class="mb-3 position-relative">
<input type="text" id="search" class="form-control" placeholder="Cari tag...">
<div id="suggestions" class="suggestion-box d-none"></div>
</div>

<!-- SORTING -->
<form method="GET" class="mb-3">
<select name="sort" class="form-select" onchange="this.form.submit()">
    <option value="terbaru" <?= $sort=='terbaru'?'selected':'' ?>>Terbaru</option>
    <option value="terlama" <?= $sort=='terlama'?'selected':'' ?>>Terlama</option>
</select>
</form>

<table class="table table-hover">
<thead>
<tr>
<th>No</th>
<th>Nama Tag</th>
<th>Aksi</th>
</tr>
</thead>

<tbody id="tagTable">

<?php 
$no = $start + 1;
while($d = mysqli_fetch_array($query)){ 
?>

<tr>

<?php if(isset($_GET['edit']) && $_GET['edit'] == $d['id']){ ?>

<form method="POST">
<td><?= $no++ ?></td>

<td>
<input type="text" name="nama_tag" value="<?= htmlspecialchars($d['nama_tag']) ?>" class="form-control">
<input type="hidden" name="id" value="<?= $d['id'] ?>">
</td>

<td>
<button name="update" class="btn btn-success btn-sm">Simpan</button>
<a href="tag.php" class="btn btn-secondary btn-sm">Batal</a>
</td>
</form>

<?php } else { ?>

<td><?= $no++ ?></td>

<td><?= htmlspecialchars($d['nama_tag']) ?></td>

<td>
<a href="?edit=<?= $d['id'] ?>&sort=<?= $sort ?>&page=<?= $page ?>" class="btn btn-warning btn-sm">Edit</a>

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

<!-- PAGINATION -->
<nav>
<ul class="pagination">

<?php for($i=1;$i<=$pages;$i++){ ?>
<li class="page-item <?= ($i==$page)?'active':'' ?>">
<a class="page-link" href="?page=<?= $i ?>&sort=<?= $sort ?>">
<?= $i ?>
</a>
</li>
<?php } ?>

</ul>
</nav>

</div>
</div>

</div>
</div>

<!-- JS SEARCH -->
<script>
const tags = <?php echo json_encode($tags); ?>;

const searchInput = document.getElementById('search');
const suggestionBox = document.getElementById('suggestions');
const rows = document.querySelectorAll('#tagTable tr');

searchInput.addEventListener('keyup', function(){
    let keyword = this.value.toLowerCase();
    suggestionBox.innerHTML = '';

    if(keyword === ''){
        suggestionBox.classList.add('d-none');
        rows.forEach(r => r.style.display = '');
        return;
    }

    let filtered = tags.filter(tag => 
        tag.nama_tag.toLowerCase().includes(keyword)
    );

    if(filtered.length > 0){
        suggestionBox.classList.remove('d-none');

        filtered.slice(0,5).forEach(tag => {
            let div = document.createElement('div');
            div.classList.add('suggestion-item');
            div.innerText = tag.nama_tag;

            div.onclick = () => {
                searchInput.value = tag.nama_tag;
                suggestionBox.classList.add('d-none');

                rows.forEach(row => {
                    row.style.display = row.innerText.toLowerCase().includes(tag.nama_tag.toLowerCase()) ? '' : 'none';
                });
            };

            suggestionBox.appendChild(div);
        });

    } else {
        suggestionBox.classList.add('d-none');
    }
});
</script>

<div style="height: 60px;"></div>

<?php include "../assets/footer.php"; ?>

</body>
</html>