<x-layout>
    <main class="mt-[80px]">
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
                @if (!empty($images) && count($images) > 0)
                    {{-- buatkan variabel untuk count --}}
                    <?php $count = 0; ?>
                    @foreach ($images as $image)
                        <x-shop.card_product title="Product {{ $count }}" price="{{ $image['price'] ?? 'N/A' }}"
                            image="{{ $image['webformatURL'] ?? asset('images/default.jpg') }}" class="w-6">
                        </x-shop.card_product>
                        <?php $count++; ?>
                    @endforeach
                @else
                    <p class="text-center col-span-full">No products available.</p>
                @endif
            </div>
        </div>
    </main>
</x-layout>
