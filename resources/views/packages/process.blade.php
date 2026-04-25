@extends('layouts.app')

@section('content')
    <div class="card shadow-sm p-4">
        <h1 class="fw-bold mb-4">Data Checkout</h1>

        <p><strong>Nama Paket:</strong> {{ $package['name'] }}</p>
        <p><strong>Harga:</strong> Rp {{ number_format($package['price'], 0, ',', '.') }}</p>
        <p><strong>Nama Pembeli:</strong> {{ $name }}</p>
        <p><strong>Email:</strong> {{ $email }}</p>
        <p><strong>Nomor HP:</strong> {{ $phone }}</p>

        <button type="button" id="pay-button" class="btn btn-primary mt-4 w-100">
            Bayar Sekarang
        </button>
    </div>

    <script
        src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ $clientKey }}">
    </script>

    <script>
        document.getElementById('pay-button').onclick = function () {
            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    window.location.href = "{{ route('payment.success') }}";
                },
                onPending: function(result) {
                    alert('Pembayaran kamu masih pending.');
                    console.log(result);
                },
                onError: function(result) {
                    alert('Pembayaran gagal.');
                    console.log(result);
                },
                onClose: function() {
                    alert('Kamu menutup popup pembayaran sebelum menyelesaikan transaksi.');
                }
            });
        };
    </script>
@endsection