<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
            'email_222290'    => ['required', 'email'],
            'password_222290' => ['required'],
        ]);

        // Menambahkan log percobaan login
        Log::info('Attempting login for:', $credentials);  // Menyimpan log

        // Attempt login menggunakan kolom yang sudah disesuaikan
        if (Auth::attempt([
            'email_222290' => $credentials['email_222290'],
            'password'     => $credentials['password_222290']
        ])) {
            // Regenerasi session ID untuk keamanan
            $request->session()->regenerate();

            // Menyimpan data tambahan ke session, termasuk role
            session([
                'user_id'   => Auth::user()->id_222290,
                'user_role' => Auth::user()->role_222290,  // Role user, misalnya 'admin' atau 'user'
                'email'     => Auth::user()->email_222290,  // Role user, misalnya 'admin' atau 'user'
                'name'      => Auth::user()->name_222290,  // Role user, misalnya 'admin' atau 'user'
            ]);

            // Redirect berdasarkan peran pengguna
            if (Auth::user()->role_222290 === 'admin') {
                return redirect()->intended('/dashboard/produk/semua')->with('success', 'Login berhasil!');
            } else {
                return redirect()->intended('/')->with('success', 'Login berhasil!');
            }
        }

        Log::info('Session data after login attempt:', $request->session()->all());

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

        return redirect('/')->with('success', 'Logout berhasil!');
    }
}
