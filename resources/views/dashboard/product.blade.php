@extends('layouts.dashboard-layout') <!-- Menggunakan layout utama yang sudah dibuat -->

@section('title', $title) <!-- Mengisi judul halaman -->

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Daftar Produk</h1>
    <a href="{{ route('products.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-3 inline-block">Tambah Produk</a>

    @if (session('success'))
        <div class="bg-green-500 text-white p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
        <thead>
            <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">ID</th>
                <th class="py-3 px-6 text-left">Nama</th>
                <th class="py-3 px-6 text-left">Deskripsi</th>
                <th class="py-3 px-6 text-left">Harga</th>
                <th class="py-3 px-6 text-left">Kategori</th>
                <th class="py-3 px-6 text-left">Path Gambar</th>
                <th class="py-3 px-6 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            @foreach ($products as $product)
                <tr class="border-b hover:bg-gray-100">
                    <td class="py-3 px-6">{{ $product->id_222290 }}</td>
                    <td class="py-3 px-6">{{ $product->nama_222290 }}</td>
                    <td class="py-3 px-6">{{ $product->deskripsi_222290 }}</td>
                    <td class="py-3 px-6">Rp {{ number_format($product->harga_222290, 0, ',', '.') }}</td>
                    <td class="py-3 px-6">{{ $product->kategori_id_222290 }}</td>
                    <td class="py-3 px-6">{{ $product->path_img_222290 }}</td>
                    <td class="py-3 px-6">
                        <a href="{{ route('products.edit', $product->id_222290) }}" class="bg-blue-500 text-white px-2 py-1 rounded">Edit</a>
                        <form action="{{ route('products.destroy', $product->id_222290) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded" onclick="return confirm('Anda yakin ingin menghapus produk ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
