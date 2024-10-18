<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homepage - CRUD Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Additional styling for better spacing and responsiveness */
        .table-responsive {
            overflow-x: auto;
        }
        .action-buttons .btn {
            min-width: 80px; /* Set a minimum width for consistency */
            padding: 5px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url('home') ?>">CRUD Admin</a>
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
                    <a class="nav-link" href="<?= base_url('#') ?>">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('#') ?>">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Data List</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Dokumen</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($dataList) && !empty($dataList)): ?>
                                <?php foreach ($dataList as $data): ?>
                                    <tr>
                                        <td><?= esc($data['nama']); ?></td>
                                        <td><?= esc($data['mail']); ?></td>
                                        <td><?= esc($data['alamat']); ?></td>
                                        <td><a href="<?= base_url('#'); ?>" target="_blank" class="btn btn-link">Download</a></td>
                                        <td class="action-buttons">
                                            <!-- Edit Button -->
                                            <form action="<?= base_url('edit/' . $data['id_biodata']); ?>" method="get" class="d-inline">
                                                <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                                            </form>
                                            <!-- Delete Button -->
                                            <form action="<?= base_url('delete/' . $data['id_biodata']); ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data ditemukan.</td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
