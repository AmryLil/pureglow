<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users_222290'; // Sesuaikan dengan nama tabel

    // Menentukan kolom yang digunakan untuk autentikasi
    public function getAuthIdentifierName()
    {
        return 'email_222290'; // Kolom untuk email
    }

    public function getAuthPassword()
    {
        return $this->password_222290; // Kolom untuk password
    }
    public $timestamps = false;

    // Jika ada kolom lain yang perlu diisi, misalnya, untuk mass assignment
    protected $fillable = [
        'email_222290',
        'name_222290',
        'password_222290',
    ];
}
