<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_222290')->insert([
            'email_222290'    => 'admin123@gmail.com',
            'name_222290'     => 'AdminJi',
            'password_222290' => Hash::make('admin123'),
            'role_222290'     => 'admin',  // Set role sebagai admin
            // Tambahkan kolom lain jika diperlukan, misalnya nama pengguna atau ID unik
        ]);
    }
}
