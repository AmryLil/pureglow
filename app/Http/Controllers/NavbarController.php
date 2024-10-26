<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavbarController extends Controller
{
    public function showNavbar(Request $request)
    {
        // Cek apakah cookie user_id ada
        $isAuthenticated = $request->hasCookie('user_id');

        // Kirim informasi ke view navbar
        return view('components.navbar', ['isAuthenticated' => $isAuthenticated]);
    }
}
