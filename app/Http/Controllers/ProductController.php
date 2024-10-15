<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function index()
    {
        // Mengambil API key dari file .env
        $apiKey = env('PIXABAY_API_KEY'); // Pastikan API key disimpan di .env
        $query = 'skincare product'; // Query pencarian
        $url = "https://pixabay.com/api/?key={$apiKey}&q=" . urlencode($query) . "&image_type=photo";
    
        // Fetch data dari Pixabay API
        $response = Http::get($url);
    
        if ($response->successful()) {
            $data = $response->json();
            $images = $data['hits']; // Mengambil data hits (gambar)
            
            // Mengirim data images ke view shop
            return view('shop', compact('images'));
        }
    
        // Jika gagal, kembalikan view dengan pesan error
        return view('shop')->with('error', 'Failed to fetch images from Pixabay API');
    }
}
