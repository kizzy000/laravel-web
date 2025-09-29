<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Halaman Utama - Selamat Datang!</title>

    {{-- Bootstrap 5 CSS dari CDN untuk styling --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

    {{-- Bagian Navigasi --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">NamaProyek</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Konten Utama Halaman Home --}}
    <main class="container my-5">

        {{-- Hero Section / Jumbotron --}}
        <div class="p-5 mb-4 bg-light rounded-3 text-center">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">{{$username}}</h1>
                <p class="fs-4 col-md-8 mx-auto">{{$last_login}}</p>
                <a href="#" class="btn btn-primary btn-lg mt-3">Pelajari Lebih Lanjut</a>
            </div>
        </div>

        {{-- Features Section --}}
        <div class="row text-center">
            <h2 class="mb-4">Fitur Unggulan Kami</h2>

            {{-- Fitur 1 --}}
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Desain Modern</h5>
                        <p class="card-text">Dibangun dengan Bootstrap 5 untuk memastikan tampilan yang bersih dan responsif di semua perangkat.</p>
                    </div>
                </div>
            </div>

            {{-- Fitur 2 --}}
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Struktur Blade</h5>
                        <p class="card-text">Menggunakan sistem layout Blade yang efisien untuk kemudahan maintenance dan pengembangan.</p>
                    </div>
                </div>
            </div>

            {{-- Fitur 3 --}}
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Mudah Dikustomisasi</h5>
                        <p class="card-text">Kode yang rapi dan terstruktur, memudahkan Anda untuk mengubah konten sesuai kebutuhan proyek.</p>
                    </div>
                </div>
            </div>
        </div>

    </main>

    {{-- Bagian Footer --}}
    <footer class="bg-light text-center text-lg-start mt-auto">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
            © {{ date('Y') }} Hak Cipta:
            <a class="text-dark" href="/">NamaPerusahaan.com</a>
        </div>
    </footer>

    {{-- Bootstrap 5 JS Bundle dari CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
