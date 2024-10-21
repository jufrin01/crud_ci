<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Data - CRUD Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/css/editStyle.css'); ?>" rel="stylesheet"> <!-- Panggil CSS AdminLTE-style -->
</head>
<body>
<?= $this-> include('partials/navbar'); ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">Edit Data</h3>
                </div>
                <div class="card-body">
                    <?php if (isset($dataList) && !empty($dataList)): ?>
                        <form action="<?= base_url('update/' . $dataList['id_biodata']); ?>" method="post">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= esc($dataList['nama']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="mail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="mail" name="mail" value="<?= esc($dataList['mail']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?= esc($dataList['alamat']); ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="<?= base_url('data') ?>" class="btn btn-secondary">Batal</a>
                        </form>
                    <?php else: ?>
                        <p class="text-center">Data tidak ditemukan.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
