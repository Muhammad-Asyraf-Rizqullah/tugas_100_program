@include('layout.header')
<div class="content-wrapper container mt-5">
    <h2>Tambah Genre</h2>

    <form action="{{ route('genres.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_genre" class="form-label">Nama Genre</label>
            <input type="text" class="form-control @error('nama_genre') is-invalid @enderror" name="nama_genre"
                value="{{ old('nama_genre') }}">
            @error('nama_genre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('genres.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@include('layout.header')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>
    /* Custom SweetAlert Theme */
    .swal2-popup {
        background: #1a1a1a !important;
        border: 2px solid #ea6a69 !important;
        border-radius: 12px !important;
        color: white !important;
    }

    .swal2-title {
        color: #fff !important;
        font-size: 1.5em !important;
    }

    .swal2-html-container {
        color: #ccc !important;
    }

    .swal2-confirm {
        background-color: #4CAF50 !important;
        border: 2px solid #388E3C !important;
        color: white !important;
        transition: all 0.3s ease !important;
    }

    .swal2-confirm:hover {
        background-color: #45a049 !important;
        transform: scale(1.05) !important;
    }

    .swal2-success {
        border-color: #4CAF50 !important;
    }

    .swal2-error {
        border-color: #F44336 !important;
    }

    /* Existing CSS tetap sama */
    input[type="date"] {
        /* ... */
    }

    /* ... (CSS lainnya) ... */
</style>

@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
        });
    </script>
@endif

@if (session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
        });
    </script>
@endif

<!-- Existing Form Code -->
<div class="form-wrapper">
    <!-- ... (kode form tetap sama) ... -->
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Existing Preview Image Function
    function previewImage(event) {
        const preview = document.getElementById('preview');
        const file = event.target.files[0];

        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    }
</script>

@include('layout.footer')
