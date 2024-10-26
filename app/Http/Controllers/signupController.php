<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class signupController extends Controller
{
    /**
     * Menampilkan form sign up.
     */
    public function showSignupForm()
    {
        return view('signup');
    }

    /**
     * Menangani proses pendaftaran.
     */
    public function signup(Request $request)
    {
        // Validasi input
        $request->validate([
            'email_222290' => 'required|email|unique:users_222290',
            'nama_222290' => 'required|string|max:255',
            'password_222290' => 'required|string|min:8',
            'password_confirmation' => 'required|string|min:8',
        ]);

        // Memeriksa apakah password dan konfirmasi password cocok
        if ($request->input('password_222290') !== $request->input('password_confirmation')) {
            // Jika tidak cocok, kembalikan error
            throw ValidationException::withMessages([
                'password_confirmation' => ['Password tidak cocok'],
            ]);
        }

        // Membuat user baru
        User::create([
            'email_222290' => $request->input('email_222290'),
            'nama_222290' => $request->input('name_222290'),
            'password_222290' => Hash::make($request->input('password_222290')),
        ]);

        // Redirect ke halaman login setelah sukses sign up
        return redirect()->route('login')->with('success', 'Account created successfully! Please login.');
    }
}
