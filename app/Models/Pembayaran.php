<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';

    protected $fillable = [
        'nama_pelanggan',
        'jumlah',
        'metode',
        'status'
    ];
}