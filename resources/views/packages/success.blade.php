@extends('layouts.app')

@section('content')
    <div class="card shadow-sm p-4 text-center">
        <h1 class="fw-bold text-success mb-3">Pembayaran Berhasil</h1>
        <p class="mb-4">Pesanan paket resep kamu berhasil diproses.</p>

        <a href="{{ route('packages.index') }}" class="btn btn-success">
            Kembali ke Daftar Paket
        </a>
    </div>
@endsection