{{-- resources/views/albums/create.blade.php --}}
@include('layout.header')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">



<style>
    /* Global Dark Background */
    body,
    html,
    .main-panel,
    .page-body-wrapper,
    .container-scroller {
        background-color: #000 !important;
        color: #fff !important font-family: 'Poppins', sans-serif;

    }

    /* Form Wrapper */
    .form-wrapper {
        background-color: #1a1a1a;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        padding: 60px 20px 100px;
        min-height: calc(100vh - 100px);
    }

    /* Card Container */
    .card-container {
        background-color: #111;
        color: #fff;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
        outline: 3px solid #ea6a69;
        max-width: 500px;
        width: 100%;
    }

    /* Inputs & Labels */
    .form-label {
        display: block;
        margin-bottom: 6px;
    }

    .form-input {
        width: 100%;
        background-color: #111;
        border: 1px solid #666;
        color: #fff;
        padding: 10px;
        border-radius: 8px;
    }

    input[type="date"] {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }

    /* Buttons */
    .form-button {
        background-color: transparent;
        border: 3px solid #0f0;
        color: #0f0;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: bold;
    }

    .cancel-button {
        background-color: transparent;
        border: 3px solid #f00;
        color: #f00;
        padding: 10px 20px;
        border-radius: 8px;
        text-decoration: none;
    }

    /* Image Picker */
    .image-preview {
        max-width: 100%;
        margin-bottom: 10px;
        border-radius: 8px;
        display: none;
    }

    .image-label {
        display: inline-block;
        background-color: transparent;
        border: 2px solid #fff;
        color: #fff;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: bold;
        cursor: pointer;
        width: 100%;
        text-align: center;
        font-size: 16px;
    }

    .image-label i {
        margin-right: 8px;
    }

    /* CSS SweetAlert Dark Theme Overrides */
    .swal2-popup {
        background: #1a1a1a !important;
        border: 2px solid #ea6a69 !important;
        border-radius: 12px !important;
        color: white !important;
    }

    .swal2-title {
        color: #fff !important;
        font-size: 1.5em !important;
        border-bottom: 1px solid #333 !important;
    }

    .swal2-html-container {
        color: #ccc !important;
    }

    .swal2-success {
        border-color: #4CAF50 !important;
        color: #4CAF50 !important;
    }

    .swal2-error {
        border-color: #F44336 !important;
    }
</style>

<div class="form-wrapper">
    <div class="card-container">
        <h3 style="text-align: center; margin-bottom: 30px;">Tambah Album Baru</h3>

        <form action="{{ route('albums.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Judul Album -->
            <div style="margin-bottom: 20px;">
                <label for="judul_album" class="form-label">Judul Album</label>
                <input type="text" name="judul_album" id="judul_album" required
                    class="form-input @error('judul_album') is-invalid @enderror" value="{{ old('judul_album') }}">
                @error('judul_album')
                    <div style="color:#dc3545; font-size:0.875em; margin-top:0.25em;">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Artis -->
            <div style="margin-bottom: 20px;">
                <label for="artis" class="form-label">Artis</label>
                <input type="text" name="artis" id="artis" required
                    class="form-input @error('artis') is-invalid @enderror" value="{{ old('artis') }}">
                @error('artis')
                    <div style="color:#dc3545; font-size:0.875em; margin-top:0.25em;">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Genre -->
            <div style="margin-bottom: 20px;">
                <label for="id_genre" class="form-label">Genre</label>
                <select name="id_genre" id="id_genre" required
                    class="form-input @error('id_genre') is-invalid @enderror">
                    <option value="">-- Pilih Genre --</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}" {{ old('id_genre') == $genre->id ? 'selected' : '' }}>
                            {{ $genre->nama_genre }}
                        </option>
                    @endforeach
                </select>
                @error('id_genre')
                    <div style="color:#dc3545; font-size:0.875em; margin-top:0.25em;">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Tahun Terbit -->
            <div style="margin-bottom: 20px;">
                <label for="release_date" class="form-label">Tahun Terbit</label>
                <input type="date" name="release_date" id="release_date" required
                    class="form-input @error('release_date') is-invalid @enderror" value="{{ old('release_date') }}">
                @error('release_date')
                    <div style="color:#dc3545; font-size:0.875em; margin-top:0.25em;">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Harga -->
            <div style="margin-bottom: 20px;">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" name="harga" id="harga" required
                    class="form-input @error('harga') is-invalid @enderror" value="{{ old('harga') }}">
                @error('harga')
                    <div style="color:#dc3545; font-size:0.875em; margin-top:0.25em;">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Stok -->
            <div style="margin-bottom: 20px;">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" name="stok" id="stok" required
                    class="form-input @error('stok') is-invalid @enderror" value="{{ old('stok') }}">
                @error('stok')
                    <div style="color:#dc3545; font-size:0.875em; margin-top:0.25em;">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Gambar Album -->
            <div style="margin-bottom: 20px;">
                <label for="image" class="form-label">Gambar Album</label>
                <img id="preview" class="image-preview" alt="Preview Gambar">
                <label for="image" class="image-label">
                    <i class="fas fa-image"></i> Pilih Gambar
                </label>
                <input type="file" name="image" id="image" accept="image/*" onchange="previewImage(event)"
                    class="@error('image') is-invalid @enderror" hidden>
                @error('image')
                    <div style="color:#dc3545; font-size:0.875em; margin-top:0.25em;">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Tombol Aksi -->
            <div style="display:flex; justify-content:space-between; margin-top:30px;">
                <button type="submit" class="form-button">
                    <i class="fas fa-plus"></i> Simpan
                </button>
                <a href="{{ route('albums.index') }}" class="cancel-button">
                    <i class="fas fa-times"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>

<!-- Load SweetAlert2 JS dan init preview -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Preview Gambar
    function previewImage(event) {
        const preview = document.getElementById('preview');
        const file = event.target.files[0];
        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        } else {
            preview.style.display = 'none';
        }
    }

    // Notifikasi SweetAlert2
    document.addEventListener('DOMContentLoaded', function() {
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                background: '#1a1a1a',
                color: 'white',
                customClass: {
                    popup: 'swal2-dark-popup',
                    title: 'swal2-dark-title',
                    htmlContainer: 'swal2-dark-content'
                },
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                background: '#1a1a1a',
                color: 'white',
                customClass: {
                    popup: 'swal2-dark-popup',
                    title: 'swal2-dark-title',
                    htmlContainer: 'swal2-dark-content'
                },
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
        @endif
    });
</script>

@include('layout.footer')
