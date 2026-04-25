<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ResepKu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card img {
            height: 250px;
            object-fit: cover;
        }
        .recipe-detail-img {
            max-width: 400px;
            border-radius: 12px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">ResepKu</a>
        <div class="d-flex gap-2">
            <a href="{{ route('home') }}" class="btn btn-light btn-sm">Home</a>
            <a href="{{ route('categories.index') }}" class="btn btn-warning btn-sm">Kategori</a>
            <a href="{{ route('packages.index') }}" class="btn btn-success btn-sm">Paket Resep</a>
        </div>
    </div>
</nav>

    <div class="container mt-4">
        @if(isset($error))
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>