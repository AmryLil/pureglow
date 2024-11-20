@extends('layouts.app')

@section('title', 'Shop')

@section('content')
    <main class="mt-[80px] relative w-full">
        <!-- Banner Section -->


        <div id="gallery" class="relative w-full " data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative pb-10  h-[70vh] object-cover overflow-hidden rounded-lg  w-full">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out w-full" data-carousel-item>
                    <img src="{{ asset('images/banner/banner1.png') }}"
                        class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="">
                </div>
                <div class="hidden duration-700 ease-in-out w-full" data-carousel-item>
                    <img src="{{ asset('images/banner/banner2.png') }}"
                        class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="">
                </div>
                <div class="hidden duration-700 ease-in-out w-full" data-carousel-item>
                    <img src="{{ asset('images/banner/banner3.png') }}"
                        class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="">
                </div>
                <div class="hidden duration-700 ease-in-out w-full" data-carousel-item>
                    <img src="{{ asset('images/banner/banner4.png') }}"
                        class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="">
                </div>


            </div>
            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none pl-32"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button"
                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none pr-32"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>


        <div class="px-32 ">
            <!-- Featured Items Section -->
            <div class="flex justify-center items-center mb-7">
                <div class="h-0.5 bg-black w-full mt-10"></div>
                <h2 class="text-2xl font-semibold mt-10 text-center w-[800px]">PRODUK TERLARIS</h2>
                <div class="h-0.5 bg-black w-full mt-10"></div>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 ">
                @if (!empty($productsLaris) && count($productsLaris) > 0)
                    @foreach ($productsLaris as $product)
                        <x-shop.card-product :path="route('product.show', $product->id_222290)" :title="$product->nama_222290" :price="number_format($product->harga_222290, 0, ',', '.') . ' IDR'" :image="Str::startsWith($product->path_img_222290, 'http')
                            ? $product->path_img_222290
                            : asset('storage/' . $product->path_img_222290)"
                            class="w-6" />
                    @endforeach
                @else
                    <p class="text-center col-span-full">No products available.</p>
                @endif
            </div>

            <!-- Another Products Section -->
            <div class="flex justify-center items-center">
                <div class="h-0.5 bg-black w-full mt-10"></div>
                <h2 class="text-2xl font-semibold mt-10 text-center w-[800px]">PRODUK LAINNYA</h2>
                <div class="h-0.5 bg-black w-full mt-10"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-5 mt-5">
                @if (!empty($products) && count($products) > 0)
                    @foreach ($products as $product)
                        <x-shop.card-product :path="route('product.show', $product->id_222290)" :title="$product->nama_222290" :price="number_format($product->harga_222290, 0, ',', '.') . ' IDR'" :image="Str::startsWith($product->path_img_222290, 'http')
                            ? $product->path_img_222290
                            : asset('storage/' . $product->path_img_222290)"
                            class="w-6" />
                    @endforeach
                @else
                    <p class="text-center col-span-full">No products available.</p>
                @endif
            </div>

            <div class="flex justify-center items-center ">
                <x-product></x-product>
            </div>
            {{-- <div class="w-full mt-10 flex justify-center items-center">
                <a href="/shop?page=2" type="button"
                    class=" px-20 cursor-pointer text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm  py-2.5 text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">Read
                    More</a>
            </div> --}}
        </div>
    </main>
@endsection
