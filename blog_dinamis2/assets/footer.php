<footer class="footer mt-auto py-3">
    <div class="container">

        <div class="row">

            <!-- KOLOM 1 -->
            <div class="col-md-4 mb-3">
                <h5>Blog Dinamis</h5>
                <p class="small text-muted">
                    Website blog sederhana berbasis PHP & MySQL.
                </p>
            </div>

            <!-- KOLOM 2 -->
            <div class="col-md-4 mb-3">
                <h5>Menu</h5>
                <ul class="list-unstyled">
                <?php if($_SESSION['role'] == 'admin'){ ?>
                    <li><a href="../index.php" class="footer-link">Admin Homepage</a></li>
                <?php } ?>
                <?php if($_SESSION['role'] == 'author'){ ?>
                    <li><a href="../user/index.php" class="footer-link">User Homepage</a></li>
                <?php } ?>
                <li><a href="../auth/login.php" class="footer-link">Login</a></li>
                </ul>
            </div>

            <!-- KOLOM 3 -->
            <div class="col-md-4 mb-3">
                <h5>Kontak</h5>
                <p class="small text-muted mb-1">Email: nama@email.com</p>
                <p class="small text-muted">Telp: 0812-2345-6789</p>
            </div>

        </div>

        <hr>

        <div class="text-center small text-muted">
            &copy; <?= date('Y'); ?> Mohammad Satria Dinilhaq
        </div>

    </div>
</footer>

<style>
/* BACKGROUND LEBIH SOFT */
.footer {
    background: #ffffff;
    border-top: 1px solid #ddd;
    margin-top: 60px;
}

/* LINK */
.footer-link {
    text-decoration: none;
    color: #555;
}

.footer-link:hover {
    color: #0d6efd;
}
</style>