<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;

    protected $table      = 'kategori_produk_222290';  // Nama tabel kategori
    protected $primaryKey = 'id_222290';
    public $timestamps    = false;

    protected $fillable = [
        'id_222290',
        'nama_222290',
        'deskripsi_222290',
        'path_img_222290'
    ];

    // Relasi one-to-many dengan produk
    public function products()
    {
        return $this->hasMany(Product::class, 'kategori_id_222290', 'id_222290');
    }
}
