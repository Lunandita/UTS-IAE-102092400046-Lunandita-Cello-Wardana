@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm p-4">
                <h1 class="fw-bold mb-4">Checkout Paket</h1>

                <div class="mb-4">
                    <h3>{{ $package['name'] }}</h3>
                    <p>{{ $package['description'] }}</p>
                    <p class="fw-bold text-danger fs-4">
                        Rp {{ number_format($package['price'], 0, ',', '.') }}
                    </p>
                </div>

                <hr>

                <form action="{{ route('packages.process', $package['id']) }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Pembeli</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-control"
                            placeholder="Masukkan nama"
                            value="{{ old('name') }}"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control"
                            placeholder="Masukkan email"
                            value="{{ old('email') }}"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Nomor HP</label>
                        <input
                            type="text"
                            id="phone"
                            name="phone"
                            class="form-control"
                            placeholder="Masukkan nomor HP"
                            value="{{ old('phone') }}"
                            required
                        >
                    </div>

                    <button type="submit" class="btn btn-success">
                        Lanjut ke Pembayaran
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection