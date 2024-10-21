<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Admin CodeIgniter 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/css/inputStyle.css'); ?>" rel="stylesheet"> <!-- CSS AdminLTE-style -->
</head>
<body>
<?= $this-> include('partials/navbar'); ?> <!-- Navbar -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-primary shadow">
                <div class="card-header">
                    <h1 class="card-title text-center mb-0">Input Data Admin CRUD CodeIgniter 4</h1>
                </div>
                <div class="card-body">
                    <!-- Flash messages -->
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('errors')): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <!-- Form -->
                    <form action="<?= base_url('insert') ?>" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap:</label>
                            <input type="text" class="form-control form-control-sm" id="nama" name="nama" value="<?= old('nama') ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="mail" class="form-label">Email:</label>
                            <input type="email" class="form-control form-control-sm" id="mail" name="mail" value="<?= old('mail') ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat:</label>
                            <textarea class="form-control form-control-sm" id="alamat" name="alamat" rows="3" required><?= old('alamat') ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="documen" class="form-label">Unggah File:</label>
                            <input type="file" class="form-control form-control-sm" id="documen" name="documen" required>
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
