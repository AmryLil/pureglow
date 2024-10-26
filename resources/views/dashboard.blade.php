<!-- resources/views/dashboard.blade.php -->
@extends('layouts.dashboard-layout') <!-- Menggunakan layout utama yang sudah dibuat -->

@section('title', $title) <!-- Mengisi judul halaman -->

@section('content')
    <!-- Dashboard Stat Cards -->
    <div class="grid grid-cols-3 gap-4 mb-4">
        <!-- Card Total Students -->
        <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
            <div class="flex items-center gap-3 ">
                <div class="bg-slate-50 rounded-3xl p-0.5">
                    <img src="{{ asset('images/produk.png') }}" alt="murid" class="w-12">
                </div>
                <div class="text-slate-50 text-lg">
                    <div class="font-semibold">Total Produk</div>
                    <div class="font-bold">1230</div>
                </div>
            </div>
        </div>

        <!-- Card Total Teachers -->
        <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/icons/guru.png') }}" alt="teacher" class="w-16 ">
                <div class="text-slate-50 text-lg">
                    <div class="font-semibold">Total Kategori</div>
                    <div class="font-bold">60</div>
                </div>
            </div>
        </div>

        <!-- Card Total Blogs -->
        <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/icons/blog.png') }}" alt="blog" class="w-16 ">
                <div class="text-slate-50 text-lg">
                    <div class="font-semibold">Total Pengguna</div>
                    <div class="font-bold">10</div>
                </div>
            </div>
        </div>
    </div>


@endsection
