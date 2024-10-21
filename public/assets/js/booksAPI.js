fetch('https://www.dbooks.org/api/recent')
    .then(response => response.json())
    .then(data => {
        const bookList = document.getElementById('bookList');
        bookList.innerHTML = ''; // Clear previous list

        data.books.forEach((book) => {
            const bookItem = document.createElement('div');
            bookItem.className = 'col'; // Bootstrap column class

            bookItem.innerHTML = `
                <div class="card h-100 d-flex flex-column">
                    <img src="${book.image || 'https://via.placeholder.com/150'}" class="card-img-top" alt="${book.title}" style="height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">${book.title}</h5>
                        <p class="card-text">Penulis: ${book.authors || 'Pengarang tidak diketahui'}</p>
                        <a href="${book.url}" target="_blank" class="btn btn-primary mt-auto">Baca Selengkapnya</a>
                    </div>
                </div>
            `;

            bookList.appendChild(bookItem);
        });
    })
    .catch(error => {
        console.error('Gagal memuat daftar buku', error);
    });