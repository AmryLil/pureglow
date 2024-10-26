<x-layout>
    <main class="mt-[80px] relative">
        <!-- Banner Section -->
        <div class="bg-cover bg-center h-[450px] px-32 flex justify-center items-center"
            style="background-image:url('{{ asset('images/bannershop.jpg') }}')">
            <div class="text-white">
                <h1 class="text-8xl font-bold text-slate-100">Skincare</h1>
                <p class="text-lg">A dressing theme built exclusively for your shop.</p>
            </div>
        </div>

        <div class="px-32 pt-10">
            <!-- Categories Section -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <x-shop.card_category title="CATEGORY 1" desc="Explore our exclusive  "></x-shop.card_category>
                <x-shop.card_category title="CATEGORY 2" desc="Quality skincare for "></x-shop.card_category>
                <x-shop.card_category title="CATEGORY 3" desc="Innovative products "></x-shop.card_category>
            </div>

            <!-- Featured Items Section -->
            <div class="flex justify-center items-center">
                <div class="h-0.5 bg-black w-full mt-10"></div>
                <h2 class="text-2xl font-semibold mt-10 text-center w-[800px]">FEATURED PRODUCTS</h2>
                <div class="h-0.5 bg-black w-full mt-10"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mt-5">
                <x-shop.card_product title="Product 1" price="200.000" image="{{ asset('images/ktr4.jpg') }}"
                    class="w-8"></x-shop.card_product>
                <x-shop.card_product title="Product 2" price="250.000" image="{{ asset('images/ktr1.jpg') }}"
                    class="w-8"></x-shop.card_product>
                <x-shop.card_product title="Product 3" price="300.000" image="{{ asset('images/ktr3.jpg') }}"
                    class="w-8"></x-shop.card_product>
                <x-shop.card_product title="Product 4" price="350.000" image="{{ asset('images/ktr2.jpg') }}"
                    class="w-8"></x-shop.card_product>
            </div>

            <!-- Another Products Section -->
            <div class="flex justify-center items-center">
                <div class="h-0.5 bg-black w-full mt-10"></div>
                <h2 class="text-2xl font-semibold mt-10 text-center w-[800px]">ANOTHER PRODUCTS</h2>
                <div class="h-0.5 bg-black w-full mt-10"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-5 mt-5">
                @if (!empty($products) && count($products) > 0)
                    @foreach ($products as $product)
                        <x-shop.card-product :path="route('product.show', $product->id_222290)" :title="$product->nama_222290" :price="number_format($product->harga_222290, 0, ',', '.') . ' IDR'" :image="$product->path_img_222290 ?? asset('images/default.jpg')"
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
</x-layout>
