<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email_222290' => ['required', 'email'],
            'password_222290' => ['required'],
        ]);

        // Attempt login menggunakan kolom yang sudah disesuaikan
        if (Auth::attempt([
            'email_222290' => $credentials['email_222290'],
            'password' => $credentials['password_222290']
        ])) {
            // Regenerasi session ID untuk keamanan
            $request->session()->regenerate();

            // Menyimpan data tambahan ke session jika diperlukan
            session(['user_id' => Auth::user()->id_222290]);
            

            return redirect()->intended('/')->with('success', 'Login berhasil!');
        }

        return back()->withErrors([
            'email_222290' => 'Password dan email anda salah',
        ]);
    }

    // Proses logout
    public function logout(Request $request)
    {
        // Logout user dan hapus session
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logout berhasil!');
    }
}