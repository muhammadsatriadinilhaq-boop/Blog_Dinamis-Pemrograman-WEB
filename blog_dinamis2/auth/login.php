<!DOCTYPE html>
<html>
<head>
<title>Login - Blog Dinamis</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

<style>
body {
    background: linear-gradient(135deg, #4e73df, #1cc88a);
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

.card {
    border-radius: 15px;
    border: none;
}

.form-control {
    border-radius: 10px;
}

.btn {
    border-radius: 10px;
}

.logo {
    font-size: 40px;
}
</style>

</head>

<body>

<div class="card shadow p-4" style="width: 350px;">

<div class="text-center mb-3">
<h4 class="mt-2">Blog Dinamis</h4>
<small class="text-muted">Silakan login terlebih dahulu</small>
</div>

<form method="POST" action="proses_login.php">

<div class="mb-3">
<label class="form-label">Username</label>
<div class="input-group">
<span class="input-group-text"><i class="fas fa-user"></i></span>
<input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
</div>
</div>

<div class="mb-3">
<label class="form-label">Password</label>
<div class="input-group">
<span class="input-group-text"><i class="fas fa-lock"></i></span>
<input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
</div>
</div>

<button class="btn btn-primary w-100">Login</button>

</form>

<div class="text-center mt-3">
<small class="text-muted">© 2026 Blog Dinamis</small>
</div>

</div>

</body>
</html>