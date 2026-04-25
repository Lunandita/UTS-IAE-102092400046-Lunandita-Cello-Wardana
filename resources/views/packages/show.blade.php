@extends('layouts.app')

@section('content')
    <div class="card shadow-sm p-4">
        <div class="row">
            <div class="col-md-5 mb-3">
                <img src="{{ $package['image'] }}" alt="{{ $package['name'] }}" class="img-fluid rounded">
            </div>

            <div class="col-md-7">
                <h1 class="fw-bold">{{ $package['name'] }}</h1>
                <p>{{ $package['description'] }}</p>

                <h5 class="mt-4">Keuntungan Paket:</h5>
                <ul>
                    @foreach ($package['benefits'] as $benefit)
                        <li>{{ $benefit }}</li>
                    @endforeach
                </ul>

                <h4 class="text-danger mt-3">
                    Rp {{ number_format($package['price'], 0, ',', '.') }}
                </h4>

                <a href="{{ route('packages.checkout', $package['id']) }}" class="btn btn-success mt-3">
                    Beli Sekarang
                </a>
            </div>
        </div>
    </div>
@endsection