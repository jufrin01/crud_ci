<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - CRUD Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Untuk diagram -->
    <link href="<?= base_url('assets/css/homePage.css'); ?>" rel="stylesheet">
</head>
<body>
<?= $this-> include('partials/navbar'); ?>
        <div class="container mt-5">
            <div class="row">
                <!-- About Me -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">About Me</div>
                        <div class="card-body">
                            <p>Hi! Saya Jufrin, seorang Mahasiswa Sistem Informasi Di Kampus STMIK pranata Dengan NIM 109220940240 yang sedang mengembangkan aplikasi CRUD sederhana ini. Saya tertarik dengan teknologi, Dan Dunia anime. Terima kasih telah menggunakan aplikasi ini!</p>
                        </div>
                    </div>
                </div>

                <!-- Anime List -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">Anime List</div>
                        <div class="card-body">
                            <div class="row" id="animeList">
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                    <div class="card anime-list-item">
                                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Anime Image" data-bs-toggle="modal" data-bs-target="#animeModal">
                                        <div class="card-body">
                                            <h5 class="card-title">Judul Anime</h5>
                                            <p class="anime-category">Action, Adventure</p>
                                            <div class="btn-container">
                                                <a href="#" class="btn btn-primary btn-sm">Selengkapnya</a>
                                                <a href="#" class="btn btn-primary btn-sm">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="animeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Gambar Anime</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="" id="modalImage" class="modal-img" alt="Anime Image">
                            </div>
                        </div>
                    </div>
                </div>

        <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">Buku Terbaru</div>
                        <div class="card-body">
                            <div id="bookList" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                                <!-- Tempat untuk menampilkan daftar buku -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url('assets/js/script.js')?>"></script>
        <script src="<?=base_url('assets/js/booksAPI.js')?>"></script>
        <script src="<?=base_url('assets/js/animeAPI.js')?>"></script>
</body>
</html>
