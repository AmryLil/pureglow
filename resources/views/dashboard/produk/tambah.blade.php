<!-- resources/views/dashboard.blade.php -->
@extends('layouts.dashboard-layout') <!-- Menggunakan layout utama yang sudah dibuat -->

@section('title', $title) <!-- Mengisi judul halaman -->

@section('content')
    <!-- Dashboard Form for Product -->
    <div class="bg-white shadow rounded-lg p-4 w-full pt-20">
        <form class="w-full" method="POST" action="{{ route('products.store') }}"> <!-- Tentukan route penyimpanan -->
            @csrf
            <div class="mb-5">
                <label for="nama_222290" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                    Produk</label>
                <input type="text" id="nama_222290" name="nama_222290"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="Nama produk" value="{{ old('nama_222290') }}" required />
            </div>

            <div class="mb-5">
                <label for="deskripsi_222290"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                <textarea id="deskripsi_222290" name="deskripsi_222290"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="Deskripsi produk" required>{{ old('deskripsi_222290') }}</textarea>
            </div>

            <div class="mb-5">
                <label for="harga_222290" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                <input type="number" id="harga_222290" name="harga_222290"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="Harga produk" value="{{ old('harga_222290') }}" required />
            </div>

            <div class="mb-5">
                <label for="kategori_id_222290"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                <select id="kategori_id_222290" name="kategori_id_222290"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    required>
                    <option value="">Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <!-- Loop dari data kategori -->
                        <option value="{{ $category->id }}"
                            {{ old('kategori_id_222290') == $category->id ? 'selected' : '' }}>
                            {{ $category->nama_222290 }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-5">
                <label for="path_img_222290" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">URL
                    Gambar</label>
                <input type="text" id="path_img_222290" name="path_img_222290"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    placeholder="URL Gambar" value="{{ old('path_img_222290') }}" />
            </div>

            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Simpan Produk
            </button>
        </form>

        <!-- Flash message untuk notifikasi -->
        @if (session('status'))
            <div class="mt-4 text-green-600 font-medium">
                {{ session('status') }}
            </div>
        @endif

    </div>
@endsection
