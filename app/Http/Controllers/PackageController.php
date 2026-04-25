<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\Pembayaran;

class PackageController extends Controller
{
    private $packages = [
        [
            'id' => 1,
            'name' => 'Paket Masakan Indonesia',
            'price' => 50000,
            'image' => 'https://images.unsplash.com/photo-1512058564366-18510be2db19?q=80&w=1200&auto=format&fit=crop',
            'description' => 'Paket ini berisi kumpulan resep masakan khas Indonesia yang cocok untuk menu rumahan sehari-hari.',
            'benefits' => [
                'Akses resep masakan nusantara',
                'Kumpulan menu harian',
                'Cocok untuk pemula'
            ]
        ],
        [
            'id' => 2,
            'name' => 'Paket Dessert Favorit',
            'price' => 65000,
            'image' => 'https://images.unsplash.com/photo-1551024506-0bccd828d307?q=80&w=1200&auto=format&fit=crop',
            'description' => 'Paket ini berisi berbagai resep dessert yang manis, menarik, dan mudah dibuat di rumah.',
            'benefits' => [
                'Kumpulan resep dessert',
                'Cocok untuk camilan',
                'Tampilan makanan lebih menarik'
            ]
        ],
        [
            'id' => 3,
            'name' => 'Paket Menu Diet Sehat',
            'price' => 70000,
            'image' => 'https://images.unsplash.com/photo-1490645935967-10de6ba17061?q=80&w=1200&auto=format&fit=crop',
            'description' => 'Paket ini berisi resep makanan sehat yang cocok untuk pengguna yang ingin menjaga pola makan.',
            'benefits' => [
                'Menu sehat harian',
                'Pilihan makanan rendah kalori',
                'Cocok untuk gaya hidup sehat'
            ]
        ],
    ];

    public function index()
    {
        return view('packages.index', ['packages' => $this->packages]);
    }

    public function show($id)
    {
        $package = collect($this->packages)->firstWhere('id', (int) $id);
        if (!$package) abort(404);

        return view('packages.show', compact('package'));
    }

    public function checkout($id)
    {
        $package = collect($this->packages)->firstWhere('id', (int) $id);
        if (!$package) abort(404);

        return view('packages.checkout', compact('package'));
    }

    public function process(Request $request, $id)
    {
        $package = collect($this->packages)->firstWhere('id', (int) $id);
        if (!$package) abort(404);

        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
        ]);

        Pembayaran::create([
            'nama_pelanggan' => $request->name,
            'jumlah' => $package['price'],
            'metode' => 'midtrans',
            'status' => 'pending'
        ]);

        // MIDTRANS
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = filter_var(env('MIDTRANS_IS_PRODUCTION', false), FILTER_VALIDATE_BOOLEAN);
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $orderId = 'ORDER-' . $package['id'] . '-' . time();

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $package['price'],
            ],
            'customer_details' => [
                'first_name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ],
            'item_details' => [
                [
                    'id' => $package['id'],
                    'price' => $package['price'],
                    'quantity' => 1,
                    'name' => $package['name'],
                ]
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        return view('packages.process', [
            'package' => $package,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'snapToken' => $snapToken,
            'clientKey' => env('MIDTRANS_CLIENT_KEY'),
        ]);
    }

    public function success()
    {
        return view('packages.success');
    }
}