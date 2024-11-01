{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <section class="py-12 pt-28 h-screen bg-gray-100">
        <div class="px-32 flex items-center justify-between">
            <div class="max-w-lg">
                <h1 class="text-9xl text-gray-800">Glow <span class="block text-6xl">Kilau Alami, Cinta Kulitmu!</span></h1>
                <p class="mt-4 text-gray-900">
                    Dapatkan kulit bercahaya dan sehat dengan rangkaian produk skincare alami dan efektif kami, dirancang
                    khusus untuk kebutuhan kulit Anda.
                </p>
                <a href="#" class="inline-block mt-6 bg-black text-white py-3 px-6 rounded-lg hover:bg-gray-800">Get
                    Started</a>
                <div class="flex mt-8 space-x-8">
                    <div>
                        <h3 class="text-3xl font-bold">+120</h3>
                        <p class="text-gray-900">Produk</p>
                    </div>
                    <div>
                        <h3 class="text-3xl font-bold">+10</h3>
                        <p class="text-gray-900">Kategori</p>
                    </div>
                </div>
            </div>
            <div class="relative">
                <div class="w-[500px] h-[450px] overflow-hidden shadow-lg border_custom">
                    <img src={{ asset('images/image1.jpg') }} alt="Skincare Model"
                        class="w-full h-full object-cover shadow-lg shadow-slate-900">
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-12">
        <div class="px-32 w-full h-full">
            <h1 class="text-center text-4xl font-bold">Shop by Categories</h1>
            <h2 class="text-center text-xl font-light mb-6 mt-2">Our products are designed for everyone</h2>
            <div class="flex w-full h-[75vh] gap-2">
                <div class="w-1/2 h-full">
                    <div class="relative group">
                        <img src="{{ asset('images/ktr2.jpg') }}" alt="Skincare"
                            class="w-full h-[76.5vh] object-cover rounded-lg">
                        <div
                            class="absolute inset-0 flex justify-center items-center bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg">
                            <span class="text-white font-bold text-lg">Skincare</span>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col w-1/2 gap-2">
                    <div class="flex gap-2 w-full h-1/2">
                        <div class="relative group w-1/2">
                            <img src="{{ asset('images/ktr1.jpg') }}" alt="Bodycare"
                                class="w-full h-full object-cover rounded-lg">
                            <div
                                class="absolute inset-0 flex justify-center items-center bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg">
                                <span class="text-white font-bold text-lg">Bodycare</span>
                            </div>
                        </div>
                        <div class="relative group w-1/2">
                            <img src="{{ asset('images/ktr4.jpg') }}" alt="Accessories"
                                class="w-full h-full object-cover rounded-lg">
                            <div
                                class="absolute inset-0 flex justify-center items-center bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg">
                                <span class="text-white font-bold text-lg">Accessories</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex w-full relative group h-1/2">
                        <img src="{{ asset('images/ktr3.jpg') }}" alt="Haircare"
                            class="w-full h-full object-cover rounded-lg">
                        <div
                            class="absolute inset-0 flex justify-center items-center bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg">
                            <span class="text-white font-bold text-lg">Haircare</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bestsellers Section -->
    <section class="py-12 bg-white px-32">
        <div class="container mx-auto">
            <h2 class="text-center text-3xl font-semibold">Produk Terlaris</h2>
            <h2 class="text-center text-xl font-light mb-6 mt-2 mx-52">Temukan produk terlaris kami yang telah menjadi
                favorit pelanggan, memberikan hasil terbaik untuk kulit Anda!</h2>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                <div class="bg-gray-100 p-2 rounded-lg shadow hover:shadow-lg transition-shadow">
                    <img src={{ asset('images/ktr1.jpg') }} alt="Product 1"
                        class="w-full h-96 object-cover rounded-lg mb-4">
                    <h3 class="text-xl font-bold mb-2">$8.00 - $10.00</h3>
                    <p class="text-sm text-gray-900">Natural Coconut Cleansing Oil</p>
                </div>
                <div class="bg-gray-100 p-2 rounded-lg shadow hover:shadow-lg transition-shadow">
                    <img src={{ asset('images/ktr2.jpg') }} alt="Product 2"
                        class="w-full h-96 object-cover rounded-lg mb-4">
                    <h3 class="text-xl font-bold mb-2">$9.00</h3>
                    <p class="text-sm text-gray-900">Enriched Wash</p>
                </div>
                <div class="bg-gray-100 p-2 rounded-lg shadow hover:shadow-lg transition-shadow">
                    <img src={{ asset('images/ktr4.jpg') }} alt="Product 3"
                        class="w-full h-96 object-cover rounded-lg mb-4">
                    <h3 class="text-xl font-bold mb-2">$42.00 - $46.00</h3>
                    <p class="text-sm text-gray-900">Scalp Moisturizing Cream</p>
                </div>
                <div class="bg-gray-100 p-2 rounded-lg shadow hover:shadow-lg transition-shadow">
                    <img src={{ asset('images/ktr3.jpg') }} alt="Product 4"
                        class="w-full h-96 object-cover rounded-lg mb-4">
                    <h3 class="text-xl font-bold mb-2">$45.00</h3>
                    <p class="text-sm text-gray-900">Shine Serum</p>
                </div>
            </div>
        </div>
    </section>
@endsection
