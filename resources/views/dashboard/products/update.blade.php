@extends('layouts.dashboard-layout') <!-- Menggunakan layout utama yang sudah dibuat -->

@section('title', $title) <!-- Mengisi judul halaman -->

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Tambah Produk</h1>

    @if ($errors->any())
        <div class="bg-red-500 text-white p-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="nama_222290" class="block text-sm font-medium">Nama Produk</label>
            <input type="text" name="nama_222290" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>
        <div class="mb-4">
            <label for="deskripsi_222290" class="block text-sm font-medium">Deskripsi</label>
            <textarea name="deskripsi_222290" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" rows="3"></textarea>
        </div>
        <div class="mb-4">
            <label for="harga_222290" class="block text-sm font-medium">Harga</label>
            <input type="number" name="harga_222290" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>
        <div class="mb-4">
            <label for="kategori_id_222290" class="block text-sm font-medium">ID Kategori</label>
            <input type="number" name="kategori_id_222290" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>
        <div class="mb-4">
            <label for="path_img_222290" class="block text-sm font-medium">Path Gambar</label>
            <input type="text" name="path_img_222290" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('products.index') }}" class="bg-gray-300 text-black px-4 py-2 rounded">Kembali</a>
    </form>
</div>
@endsection
