<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table      = 'transaksi_222290';
    protected $primaryKey = 'id_transaksi_222290';

    protected $fillable = [
        'id_pelanggan_222290',
        'jumlah_222290',
        'id_produk_222290',
        'harga_total_222290',
        'status_222290',
        'bukti_tf_222290',
        'tanggal_transaksi_222290'
    ];

    // Relasi ke pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(User::class, 'id_pelanggan_222290', 'id_222290');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'id_222290', 'id_produk_222290');
    }

    // Query scope untuk filter transaksi hari ini
    public function scopeHariIni($query)
    {
        return $query->whereDate('tanggal_transaksi_222290', Carbon::today());
    }

    // Query scope untuk filter transaksi minggu ini
    public function scopeMingguIni($query)
    {
        return $query->whereBetween('tanggal_transaksi_222290', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ]);
    }

    // Query scope untuk filter transaksi bulan ini
    public function scopeBulanIni($query)
    {
        return $query
            ->whereMonth('tanggal_transaksi_222290', Carbon::now()->month)
            ->whereYear('tanggal_transaksi_222290', Carbon::now()->year);
    }
}
