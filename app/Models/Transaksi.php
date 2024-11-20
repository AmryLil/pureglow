<?php

// app/Models/Transaksi.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table      = 'transaksi_222290';
    protected $primaryKey = 'id_transaksi_222290';
    // Nama tabel di database

    protected $fillable = [
        'id_pelanggan_222290',
        'jumlah_222290',
        'id_produk_222290',
        'harga_total_222290',
        'status_222290',
        'bukti_tf_222290',
        'tanggal_transaksi_222290'
    ];

    public function pelanggan()
    {
        return $this->belongsTo(User::class, 'id_pelanggan_222290', 'id_222290');  // Foreign key dan primary key
    }
}
