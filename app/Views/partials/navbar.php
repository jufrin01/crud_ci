<style>
    .navbar-custom {
        background: linear-gradient(45deg, #3498db, #8e44ad); /* Gradient from blue to purple */
        border-bottom: 2px solid #2c3e50; /* Add a solid border to the bottom for a sleek look */
    }

    .navbar-brand, .nav-link {
        color: white !important; /* Make sure the text stands out on the new background */
    }

    .navbar-brand:hover, .nav-link:hover {
        color: #f39c12 !important; /* Optional: Add a hover effect for links */
    }
</style>

<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url('/') ?>">BOOK ADMIN - JUFRIN</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('input') ?>">Tambah Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('data') ?>">Lihat Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('register') ?>">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
