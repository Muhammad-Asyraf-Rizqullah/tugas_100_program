{{-- resources/views/albums/index.blade.php --}}
@include('layout.header')

<div class="container-fluid mt-4">
    <h2 class="text-black text-center">Stock Album</h2>

    <div class="d-flex justify-content-between mb-2">
        <a href="{{ route('albums.create') }}" class="btn-album-custom">+ Tambah Album</a>
        <button id="toggleMenu" class="btn-custom-transaksi">
            <!-- SVG Icon Cart -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="90" height="90" fill="currentColor">
                <g>
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path
                        d="M7 8V6a5 5 0 1 1 10 0v2h3a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1h3zm0 2H5v10h14V10h-2v2h-2v-2H9v2H7v-2zm2-2h6V6a3 3 0 0 0-6 0v2z" />
                </g>
            </svg>
            <span>Lihat Transaksi</span>
        </button>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div id="layoutWrapper" class="layout-wrapper d-flex transition">
        {{-- Daftar Album --}}
        <div class="content-album flex-grow-1 pe-3">
            <div class="row" style="gap:30px; justify-content:center;">
                @forelse($albums as $album)
                    <div class="card-wrapper" style="box-shadow:0 7px 15px rgba(0,0,0,0.2);">
                        <div class="card h-100 shadow-lg" style="background:#111; color:#fff; border-radius:12px;">
                            @if ($album->image)
                                <div class="image-container" style="position:relative; width:100%; aspect-ratio:1/1;">
                                    <img src="{{ asset('images/' . $album->image) }}" alt="Gambar Album"
                                        style="width:100%; height:100%; object-fit:cover;
                                                border-top-left-radius:12px; border-top-right-radius:12px;">
                                    {{-- tombol tambah album tetap CSS merah --}}
                                    <button class="btn-tambah-album" data-album="{{ $album->id }}"
                                        data-nama="{{ $album->judul_album }}" data-harga="{{ $album->harga }}"
                                        data-img="{{ asset('images/' . $album->image) }}">
                                        +
                                    </button>
                                </div>
                            @endif

                            <div class="card-body">
                                <h5 class="card-title">{{ $album->judul_album }}</h5>
                                <p class="mb-1"><strong>Artis:</strong> {{ $album->artis }}</p>
                                <p class="mb-1"><strong>Genre:</strong> {{ $album->genre->nama_genre }}</p>
                                <p class="mb-1"><strong>Tahun:</strong> {{ $album->release_date }}</p>
                                <p class="mb-1"><strong>Harga:</strong>
                                    Rp{{ number_format($album->harga, 0, ',', '.') }}</p>
                                <p><strong>Stok:</strong> {{ $album->stok }}</p>
                            </div>

                            <div class="card-footer d-flex justify-content-between"
                                style="background:transparent; border-top:1px solid #333; gap:0.5rem;">
                                <a href="{{ route('albums.show', $album->id) }}" class="button">Detail</a>
                                <a href="{{ route('albums.edit', $album->id) }}" class="button-edit">Edit</a>
                                <form action="{{ route('albums.destroy', $album->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin hapus?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="button-red">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">Belum ada album yang ditambahkan.</p>
                @endforelse
            </div>
        </div>

        {{-- Sidebar Transaksi --}}
        <div id="menuTransaksi" class="menu-transaksi-wrapper">
            <div class="card shadow p-3 h-100" style="background:#111; border-radius:12px; color:#fff;">
                <h5>Transaksi Kasir</h5>
                <hr style="border-color:#555;">
                <ul id="transaksiList" class="list-unstyled mb-3"></ul>
                <p><strong>Total: Rp <span id="totalPrice">0</span></strong></p>
                <button class="btn btn-success w-100" style="color: black; font-weight: 600;">
                    Konfirmasi Pembelian
                </button>

            </div>
        </div>
    </div>
</div>



<style>
    /* Layout & Album */
    .layout-wrapper {
        transition: 0.4s;
        position: relative;
        display: flex;
        /* Tambahkan ini agar menu dan konten sejajar horizontal */
    }

    .menu-transaksi-wrapper {
        width: 0;
        overflow: hidden;
        transition: 0.4s;
        display: flex;
        justify-content: flex-start;
    }

    .layout-wrapper.show-menu .menu-transaksi-wrapper {
        width: 800px;
        /* Perlebar sesuai kebutuhan (misalnya dari 450px jadi 600px) */
    }

    #menuTransaksi .card {
        width: 100%;
        /* Gunakan full width dari parent */
        max-width: none;
        /* Hapus batas maksimum kalau ada */
    }


    /* Tombol Tambah Album (modern, merah menyala) */
    .btn-tambah-album {
        position: absolute;
        top: 10px;
        right: 10px;
        background: transparent;
        color: #ffffff;
        padding: 10px 18px;
        font-weight: 600;
        border: 2px solid #000;
        /* Outline style */
        border-radius: 12px;
        cursor: pointer;
        box-shadow: none;
        /* Hapus shadow jika ingin tampilan minimalis */
        transition: all 0.3s ease-in-out;
        z-index: 10;
    }

    .btn-tambah-album:hover {
        background: #000;
        /* Atau kamu bisa ganti dengan warna lain */
        color: #fff;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        /* Tambahkan efek saat hover */
    }


    /* Transaksi Item */
    .transaksi-item {
        display: flex;
        align-items: center;
        padding: 10px;
        background: #1a1a1a;
        border-radius: 8px;
        margin-bottom: 10px;
    }

    .transaksi-item img {
        width: 40px;
        height: 40px;
        object-fit: cover;
        margin-right: 10px;
    }

    .transaksi-item .detail {
        flex: 1;
    }

    /* Quantity Buttons (Sidebar Transaksi) */
    .quantity-btn {
        display: flex;
        align-items: center;
        gap: 5px;
        margin-left: auto;
    }

    .quantity-btn button {
        background: transparent;
        border: 2px solid #fff;
        border-radius: 6px;
        width: 32px;
        height: 32px;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        transition: background 0.2s;
    }

    .quantity-btn button:hover {
        background: rgba(255, 255, 255, 0.1);
    }
</style>

<script>
    document.getElementById('toggleMenu').onclick = () =>
        document.getElementById('layoutWrapper').classList.toggle('show-menu');

    let totalHarga = 0;

    function addToTransaksi(id, nama, harga, imgSrc) {
        const list = document.getElementById('transaksiList');
        const total = document.getElementById('totalPrice');

        const li = document.createElement('li');
        li.className = 'transaksi-item';
        li.innerHTML = `
        <img src="${imgSrc}" alt="${nama}">
        <div class="detail">
            <p style="margin:0; color:#fff;">${nama} - Rp${harga.toLocaleString()}</p>
        </div>
        <div class="quantity-btn">
            <button class="decrease-btn">−</button>
            <span class="quantity" style="margin:0 8px; color:#fff;">1</span>
            <button class="increase-btn">+</button>
        </div>
    `;
        list.appendChild(li);

        totalHarga += harga;
        total.textContent = totalHarga.toLocaleString();

        li.querySelector('.increase-btn').onclick = () => {
            const q = li.querySelector('.quantity');
            q.textContent = +q.textContent + 1;
            updateTotal(harga);
        };
        li.querySelector('.decrease-btn').onclick = () => {
            const q = li.querySelector('.quantity');
            if (+q.textContent > 1) {
                q.textContent = +q.textContent - 1;
                updateTotal(-harga);
            }
        };
    }

    function updateTotal(diff) {
        totalHarga += diff;
        document.getElementById('totalPrice').textContent = totalHarga.toLocaleString();
    }

    document.querySelectorAll('.btn-tambah-album').forEach(btn =>
        btn.onclick = function() {
            addToTransaksi(
                this.dataset.album,
                this.dataset.nama,
                +this.dataset.harga,
                this.dataset.img
            );
            document.getElementById('layoutWrapper').classList.add('show-menu');
        }
    );
</script>

@include('layout.footer')
