<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homepage - CRUD Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/css/lihatDataStyle.css'); ?>" rel="stylesheet"> <!-- Memanggil file CSS terpisah -->
</head>
<body>
<?= $this-> include('partials/navbar'); ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
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
                                            <form action="<?= base_url('edit/' . $data['id_biodata']); ?>" method="get">
                                                <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                                            </form>
                                            <!-- Delete Button -->
                                            <form action="<?= base_url('delete/' . $data['id_biodata']); ?>" method="post" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
