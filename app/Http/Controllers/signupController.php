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
        $request->validate(
            [
                'email_222290'          => 'required|email|unique:users_222290',
                'name_222290'           => 'required|string|max:255',
                'password_222290'       => 'required|string|min:8|max:10',
                'password_confirmation' => 'required|string|min:8|max:10',
            ],
            [
                // Pesan error untuk email
                'email_222290.required' => 'Email wajib diisi.',
                'email_222290.email'    => 'Masukkan email yang valid.',
                'email_222290.unique'   => 'Email sudah terdaftar.',
                // Pesan error untuk name
                'name_222290.required' => 'Nama wajib diisi.',
                'name_222290.string'   => 'Nama harus berupa teks.',
                'name_222290.max'      => 'Nama tidak boleh lebih dari 255 karakter.',
                // Pesan error untuk password
                'password_222290.required' => 'Password wajib diisi.',
                'password_222290.string'   => 'Password harus berupa teks.',
                'password_222290.min'      => 'Password harus memiliki minimal 8 karakter.',
                'password_222290.max'      => 'Password tidak boleh lebih dari 10 karakter.',
                // Pesan error untuk konfirmasi password
                'password_confirmation.required' => 'Konfirmasi password wajib diisi.',
                'password_confirmation.string'   => 'Konfirmasi password harus berupa teks.',
                'password_confirmation.min'      => 'Konfirmasi password harus memiliki minimal 8 karakter.',
                'password_confirmation.max'      => 'Konfirmasi password tidak boleh lebih dari 10 karakter.',
            ]
        );

        // Memeriksa apakah password dan konfirmasi password cocok
        if ($request->input('password_222290') !== $request->input('password_confirmation')) {
            // Jika tidak cocok, kembalikan error
            throw ValidationException::withMessages([
                'password_confirmation' => ['Password tidak cocok.'],
            ]);
        }

        // Membuat user baru
        User::create([
            'email_222290'    => $request->input('email_222290'),
            'name_222290'     => $request->input('name_222290'),
            'password_222290' => Hash::make($request->input('password_222290')),
        ]);

        // Redirect ke halaman login setelah sukses sign up
        return redirect()->route('login')->with('success', 'Account created successfully! Please login.');
    }
}
