@extends('layouts.app')

@section('content')
    <div class="text-center mb-4">
        <h1 class="fw-bold">Daftar Paket Resep</h1>
        <p class="text-muted">Pilih paket resep yang ingin dibeli</p>
    </div>

    <div class="row">
        @foreach ($packages as $package)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <img src="{{ $package['image'] }}" class="card-img-top" alt="{{ $package['name'] }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $package['name'] }}</h5>
                        <p class="card-text">{{ $package['description'] }}</p>
                        <p class="fw-bold text-danger mb-3">
                            Rp {{ number_format($package['price'], 0, ',', '.') }}
                        </p>

                        <a href="{{ route('packages.show', $package['id']) }}" class="btn btn-primary mt-auto">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection