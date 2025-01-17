<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Jika nama tabel tidak sesuai dengan konvensi Laravel, Anda bisa mendefinisikannya seperti ini:
    protected $table = 'produk_222290';  // Ganti 'skincare' dengan nama tabel Anda jika berbeda

    // Set primary key ke id_222290
    public $timestamps    = false;
    protected $primaryKey = 'id_222290';

    // Jika ada kolom yang tidak boleh diisi mass-assignable
    protected $fillable = [
        'id_222290',
        'nama_222290',
        'deskripsi_222290',
        'harga_222290',
        'kategori_id_222290',
        'path_img_222290',
        'jumlah_222290',
        'created_at'
        // tambahkan kolom lain sesuai kebutuhan
    ];

    public function category()
    {
        return $this->belongsTo(CategoryProduct::class, 'kategori_id_222290', 'id_222290');
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class, 'product_id_222290', 'id_222290');
    }

    public function scopeHari($query)
    {
        return $query->whereDate('created_at', Carbon::today());
    }

    // Query scope untuk filter transaksi minggu ini
    public function scopeMinggu($query)
    {
        return $query->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ]);
    }

    public function scopeBulan($query)
    {
        return $query
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year);
    }
}
