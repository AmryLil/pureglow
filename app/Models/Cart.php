<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table      = 'carts_222290';
    protected $primaryKey = 'id_222290';

    protected $fillable = [
        'user_id_222290'
    ];

    public function items()
    {
        return $this->hasMany(CartItem::class, 'cart_id_222290', 'id_222290');
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class, 'cart_id_222290', 'id_222290');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id_222290', 'id_222290');
    }
}
