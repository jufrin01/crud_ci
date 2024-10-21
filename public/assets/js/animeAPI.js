// Fetch Anime Data
fetch('https://kitsu.io/api/edge/anime?page[limit]=12') // Batasi jumlah hasil ke 12
    .then(response => response.json())
    .then(data => {
        const animeList = document.getElementById('animeList');
        animeList.innerHTML = ''; // Kosongkan konten sebelumnya

        data.data.forEach((anime) => {
            const attributes = anime.attributes;
            const title = attributes.canonicalTitle;
            const imageUrl = attributes.posterImage ? attributes.posterImage.small : 'https://via.placeholder.com/100'; // Gambar anime dengan fallback
            const categories = attributes.showType || "Unknown"; // Ambil kategori anime

            const animeItem = document.createElement('div');
            animeItem.className = 'col-12 col-sm-6 col-md-4 col-lg-3';

            animeItem.innerHTML = `
                    <div class="card anime-list-item">
                        <img src="${imageUrl}" class="card-img-top" alt="${title}" data-bs-toggle="modal" data-bs-target="#animeModal">
                        <div class="card-body">
                            <h5 class="card-title">${title}</h5>
                            <p class="anime-category">${categories}</p>
                            <a href="https://kitsu.io/anime/${anime.id}" target="_blank" class="btn btn-primary btn-sm">Detail</a>
                        </div>
                    </div>
                `;

            // Add event listener for modal image
            animeItem.querySelector('img').addEventListener('click', function() {
                document.getElementById('modalImage').src = imageUrl;
            });

            animeList.appendChild(animeItem);
        });
    })
    .catch(error => {
        console.error('Gagal memuat data anime', error);
    });