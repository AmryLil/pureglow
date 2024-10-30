<x-layout>
    <div class="px-32 mt-12 relative min-h-screen h-full">
        <div class="flex justify-center items-center">
            <div class="h-0.5 bg-black w-full mt-10"></div>
            <h2 class="text-2xl font-semibold mt-10 text-center w-[800px]">LIST PRODUCTS</h2>
            <div class="h-0.5 bg-black w-full mt-10"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-5 mt-5">
            @if (!empty($category->products) && count($category->products) > 0)
                @foreach ($category->products as $product)
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


    </div>

</x-layout>
