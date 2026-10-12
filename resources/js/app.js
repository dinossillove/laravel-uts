import './bootstrap';

document.addEventListener('DOMContentLoaded', function () {

    // 1. Menampilkan dan menyembunyikan password
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    if (togglePassword && password) {
        togglePassword.addEventListener('click', function () {
            const hidden = password.type === 'password';

            password.type = hidden ? 'text' : 'password';

            togglePassword.textContent = hidden
                ? 'Sembunyikan'
                : 'Lihat';
        });
    }

    // 2. Konfirmasi sebelum menghapus produk
    const deleteForms = document.querySelectorAll('.delete-form');

    deleteForms.forEach(function (form) {
        form.addEventListener('submit', function (event) {
            const yakin = confirm(
                'Apakah Anda yakin ingin menghapus produk ini?'
            );

            if (!yakin) {
                event.preventDefault();
            }
        });
    });

    // 3. Pencarian produk berdasarkan nama
    const searchInput = document.getElementById('searchProduct');
    const rows = document.querySelectorAll('.product-row');
    const noResults = document.getElementById('noSearchResults');

    if (searchInput) {
        searchInput.addEventListener('input', function () {
            const keyword = searchInput.value.toLowerCase();
            let jumlahDitemukan = 0;

            rows.forEach(function (row) {
                const nama = row
                    .querySelector('.product-name')
                    .textContent
                    .toLowerCase();

                if (nama.includes(keyword)) {
                    row.classList.remove('hidden');
                    jumlahDitemukan++;
                } else {
                    row.classList.add('hidden');
                }
            });

            if (noResults) {
                noResults.classList.toggle(
                    'hidden',
                    jumlahDitemukan > 0 || rows.length === 0
                );
            }
        });
    }

});