<x-layout>
    <div class="w-full mt-20 px-32">
        <div class="bg-white p-2 rounded-lg shadow-md gap-2">
            <div class="flex">
                <!-- Product Image -->
                <div class="w-1/2 flex justify-center relative h-[80vh]">
                    <img src="{{ Str::startsWith($product->path_img_222290, 'http') ? $product->path_img_222290 : asset('storage/images/' . $product->path_img_222290) }}"
                        alt="Product Image">

                </div>

                <!-- Product Details -->
                <div class="w-1/2 flex flex-col p-2 justify-between px-6">
                    <div class="text-start mt-2">
                        <h1 class="text-4xl font-bold">{{ $product->nama_222290 }}</h1>
                        <p class="text-xl text-gray-900 font-light mt-2">Product Categoriesz</p>
                        <div class="h-0.5 w-full bg-slate-900 mt-3"></div>

                        <!-- Pastikan ada atribut category -->
                    </div>

                    <!-- Product Specs -->
                    <div>
                        <div class="mt-6 text-base">
                            <p class="text-xl text-gray-900 font-light">Description</p>
                            <p class="text-lg">
                                {{ $product->deskripsi_222290 }}
                            </p>
                        </div>
                        <div class="flex justify-start mt-5 items-center space-x-4">
                            <!-- Minus Button -->
                            <div class="text-lg font-semibold">
                                Quantity
                            </div>
                            <div class="flex gap-2">
                                <button id="decrement"
                                    class="bg-gray-200 text-gray-800 font-bold rounded-sm h-6 w-6 flex justify-center items-center hover:bg-gray-300">
                                    -
                                </button>

                                <!-- Quantity Display -->
                                <span id="qty" class="text-base font-semibold">1</span>

                                <!-- Plus Button -->
                                <button id="increment"
                                    class="bg-gray-200 text-gray-800 font-bold rounded-sm h-6 w-6 flex justify-center items-center hover:bg-gray-300">
                                    +
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Price -->
                    <div>
                        <div class="mt-6 text-start">
                            <p class="text-5xl font-bold">Rp {{ number_format($product->harga_222290, 0, ',', '.') }}
                            </p>
                        </div>

                        <!-- Add to Cart Button -->
                        <div class="mt-2 mb-2 flex justify-center w-full gap-2 justify-self-end">
                            <button class="bg-black text-white py-2 px-4 rounded-md hover:bg-gray-900 w-[80%]">
                                Checkout Now
                            </button>
                            <button class="w-[20%] bg-black justify-center flex rounded-md">
                                <img src="{{ asset('images/carts.png') }}" alt="" class="h-12 ">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- another product --}}
            <div>
                <div class="flex justify-center items-center">
                    <div class="h-0.5 bg-black w-full mt-10"></div>
                    <h2 class="text-2xl font-semibold mt-10 text-center w-[800px]">ANOTHER PRODUCTS</h2>
                    <div class="h-0.5 bg-black w-full mt-10"></div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
