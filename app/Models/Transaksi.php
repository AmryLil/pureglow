<?php

// app/Models/Transaksi.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi_222290';  // Nama tabel di database

    protected $fillable = [
        'id_pelanggan_222290',
        'order_id_222290',
        'transaction_id_222290',
        'jumlah_222290',
        'id_produk_222290',
        'harga_total_222290',
        'status_222290',
        'metode_pembayaran_222290',
        'tanggal_transaksi_222290'
    ];
}
