<div class="max-w-xs rounded-lg overflow-hidden shadow-lg bg-white hover:scale-105 transition-all duration-150">
    <!-- Image Section -->
    <div class="relative ">
        <img class="w-full h-64 object-cover" src="{{ $image }}" alt="Modern Wood Furniture">
        <!-- Icon in the corner -->
        <div class="absolute top-2 right-2">
            <img src={{ asset('images/love.png') }} alt="" class="w-6">
        </div>
    </div>
    <!-- Text Section -->
    <div class="p-2 px-4 flex justify-between items-center">
        <div>
            <h3 class="text-base ">{{ $title }}</h3>
            <p class="text-gray-700 ">Rp {{ $price }}</p>
        </div>
        <div>
            <img src={{ asset('images/cart2.png') }} alt="cart" class="{{ $class }}">
        </div>
    </div>
</div>
