@props(['path', 'title', 'price', 'image', 'class'])
<a href="{{ $path }}"
    class="relative max-w-xs rounded-lg overflow-hidden shadow-lg bg-white
    hover:scale-105 transition-all duration-150 cursor-pointer">
    <!-- Image Section -->
    <div class="h-64">
        <img class="w-full h-full object-center object-cover" src="{{ $image }}" alt="{{ $title }}">
        <!-- Icon in the corner -->
        <div class="absolute top-0 -left-1.5 bg-slate-50 rounded-br-lg p-2 py-1 shadow">
            <img src="{{ asset('images/love.png') }}" alt="" class="w-5 translate-x-1">
        </div>
        <div class="absolute bottom-14 -right-1.5 bg-slate-50 rounded-tl-lg p-3 py-1.5 shadow">
            <img src="{{ asset('images/carts.png') }}" alt="cart" class="{{ $class }} -translate-x-1">
        </div>
    </div>
    <!-- Text Section -->
    <div class="p-2 px-4 flex justify-center items-center">
        <div>

            <h3 class="text-xs font-bold">{{ $title }}</h3>
            <p class="text-gray-950 font-bold">{{ $price }}</p>
        </div>
    </div>
</a>
