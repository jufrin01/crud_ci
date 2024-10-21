// API Anime Top 1-10
fetch('https://api.jikan.moe/v4/top/anime')
    .then(response => response.json())
    .then(data => {
        const animeList = document.getElementById('animeList');
        animeList.innerHTML = ''; // Kosongkan list sebelumnya
        data.data.slice(0, 10).forEach((anime, index) => {
            const listItem = document.createElement('li');
            listItem.className = 'list-group-item';
            listItem.innerHTML = `${index + 1}. ${anime.title}`;
            animeList.appendChild(listItem);
        });
    })
    .catch(error => {
        document.getElementById('animeList').innerHTML = '<li class="list-group-item">Gagal memuat daftar anime</li>';
    });

// API untuk Harga Emas
fetch('http://localhost:8080/gold-price')
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            document.getElementById('goldPrice').innerHTML = 'Gagal memuat harga emas: ' + data.error;
        } else {
            const price = data.price;
            const currency = data.currency;
            document.getElementById('goldPrice').innerHTML = `Harga Emas: ${price} ${currency}`;
        }
    })
    .catch(error => {
        document.getElementById('goldPrice').innerHTML = 'Gagal memuat data harga emas';
        console.error('Error:', error);
    });

// API untuk Harga Bitcoin dan Emas
// Promise.all([
//     fetch('https://api.coindesk.com/v1/bpi/currentprice/BTC.json'),
//     fetch('https://metals-api.com/api/latest?access_key=goldapi-1qtfsm2ihh7da-io&base=USD&symbols=XAU')
// ])
//     .then(async ([bitcoinResponse, goldResponse]) => {
//         const bitcoinData = await bitcoinResponse.json();
//         const goldData = await goldResponse.json();
//         const bitcoinPrice = parseFloat(bitcoinData.bpi.USD.rate.replace(',', ''));
//         const goldPrice = goldData.rates.XAU;
//         const labels = ['Bitcoin', 'Emas'];
//         const data = {
//             labels: labels,
//             datasets: [{
//                 label: 'Harga dalam USD',
//                 backgroundColor: ['#f39c12', '#e74c3c'],
//                 borderColor: ['#f39c12', '#e74c3c'],
//                 data: [bitcoinPrice, goldPrice]
//             }]
//         };
//         const config = {
//             type: 'bar',
//             data: data,
//             options: {
//                 scales: {
//                     y: {
//                         beginAtZero: true
//                     }
//                 }
//             }
//         };
//         const myChart = new Chart(
//             document.getElementById('priceChart'),
//             config
//         );
//     })
//     .catch(error => {
//         console.error('Gagal memuat data harga', error);
//     });

// Menggunakan API dari dbooks.org untuk mendapatkan daftar buku terbaru
fetch('https://www.dbooks.org/api/recent')
    .then(response => response.json())
    .then(data => {
        const bookList = document.getElementById('bookList');
        bookList.innerHTML = ''; // Kosongkan list sebelumnya

        // Iterasi data buku yang didapat dari API
        data.forEach((book) => {
            const bookItem = document.createElement('div');
            bookItem.className = 'col-md-4 mb-3';
            bookItem.innerHTML = `
                <div class="card">
                    <img src="${book.image || 'https://via.placeholder.com/150'}" class="card-img-top" alt="${book.title}">
                    <div class="card-body">
                        <h5 class="card-title">${book.title}</h5>
                        <p class="card-text">${book.authors ? book.authors.join(', ') : 'Pengarang tidak diketahui'}</p>
                        <p class="card-text">Keterangan: ${book.description || 'Tidak tersedia'}</p>
                    </div>
                </div>
            `;
            bookList.appendChild(bookItem);
        });
    })
    .catch(error => {
        console.error('Gagal memuat daftar buku', error);
    });