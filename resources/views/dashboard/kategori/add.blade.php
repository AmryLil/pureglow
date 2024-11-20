@extends('layouts.dashboard-layout')

@section('content')
    <div class="container mx-auto p-4 pt-20">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Tambah Kategori Baru</h1>

        <form action="{{ route('dashboard.category_products.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-6 rounded-lg shadow-md">
            @csrf

            <!-- Nama Kategori -->
            <div class="mb-5">
                <label for="nama_222290" class="block text-gray-700 font-semibold mb-2">Nama Kategori</label>
                <input type="text" name="nama_222290" id="nama_222290"
                    class="border border-gray-300 p-3 rounded-lg w-full" placeholder="Masukkan nama kategori" required>
            </div>


            <!-- Deskripsi Kategori -->
            <div class="mb-5">
                <label for="deskripsi_222290" class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
                <textarea name="deskripsi_222290" id="deskripsi_222290" class="border border-gray-300 p-3 rounded-lg w-full"
                    placeholder="Deskripsi kategori (opsional)"></textarea>
            </div>

            <!-- Gambar Kategori -->
            <div class="mb-5">
                <label for="path_img_222290" class="block text-gray-700 font-semibold mb-2">Gambar Kategori</label>
                <input type="file" name="path_img_222290" id="path_img_222290"
                    class="border border-gray-300 p-3 rounded-lg w-full">
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold px-4 py-2 rounded-lg">Simpan
                Kategori</button>
        </form>
    </div>
@endsection
