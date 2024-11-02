@extends('layouts.app')

@section('title', 'Cart')

@section('content')
    <div class=" px-32 rounded-md mt-20">
        <div class="flex shadow-md">
            <div class="w-[65%] bg-white py-10">
                <div class="flex justify-between border-b pb-8 px-10">
                    <h1 class="font-semibold text-2xl">Shopping Cart</h1>
                    <h2 class="font-semibold text-2xl">{{ $cartItems->count() }} Items</h2>
                </div>

                <div class="flex mt-10 mb-5">
                    <h3 class="font-semibold px-20 text-gray-900 text-xs uppercase w-2/5">Product Details</h3>
                    <h3 class="font-semibold text-center text-gray-900 text-xs uppercase w-1/5">Quantity</h3>
                    <h3 class="font-semibold text-center text-gray-900 text-xs uppercase w-1/5">Price</h3>
                    <h3 class="font-semibold text-center text-gray-900 text-xs uppercase w-1/5">Total</h3>
                </div>

                <div class="flex flex-col gap-3">
                    @php $totalPrice = 0; @endphp
                    @foreach ($cartItems as $item)
                        @php
                            $itemTotal = $item->product->harga_222290 * $item->quantity_222290;
                            $totalPrice += $itemTotal;
                        @endphp
                        <div class="flex items-center hover:bg-gray-100  px-6 py-5">
                            <div class="flex w-2/5">
                                <div class="w-20">
                                    <img class="h-24" src="{{ $item->product->path_img_222290 }}"
                                        alt="{{ $item->product->nama_222290 }}">
                                </div>
                                <div class="flex flex-col justify-between ml-4 flex-grow">
                                    <span class="font-bold text-sm text-slate-950">{{ $item->product->nama_222290 }}</span>
                                    <span class="text-red-500 text-xs"><strong>Brand Example</strong></span>
                                    <a class="font-semibold hover:text-red-500 text-gray-500 text-xs">Remove</a>
                                </div>
                            </div>
                            <div class="flex justify-center w-1/5">
                                <input class="mx-2 border text-center w-8" type="number"
                                    value="{{ $item->quantity_222290 }}" min="1"
                                    onchange="updateQuantity({{ $item->id_222290 }}, this.value)">
                            </div>
                            <span class="text-center w-1/5 font-semibold text-sm">Rp
                                {{ number_format($item->product->harga_222290, 2) }}</span>
                            <span class="text-center w-1/5 font-semibold text-sm">Rp
                                {{ number_format($itemTotal, 2) }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <div id="summary" class="w-[35%] px-8 py-10 bg-white">
                <h1 class="font-semibold text-2xl border-b pb-8">Order Summary</h1>
                <div class="flex justify-between mt-10 mb-5">
                    <span class="font-semibold text-sm uppercase">Items {{ $cartItems->count() }}</span>

                </div>

                <div>
                    <label class="font-medium inline-block mb-3 text-sm uppercase">Shipping</label>
                    <select class="block p-2 text-gray-900 w-full text-sm">
                        <option>Standard shipping - RP 10.000</option>
                    </select>
                </div>

                <div class="py-10">
                    <label for="promo" class="font-semibold inline-block mb-3 text-sm uppercase">Promo
                        Code</label>
                    <input type="text" id="promo" placeholder="Enter your code" class="p-2 text-sm w-full">
                </div>
                <button class="bg-red-500 hover:bg-red-600 px-5 py-2 text-sm text-white uppercase">Apply</button>

                <div class="border-t mt-8">
                    <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                        <span>Total cost</span>
                        <span>RP {{ number_format($totalPrice + 10, 2) }}</span>
                    </div>
                    <button
                        class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full">Checkout</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateQuantity(itemId, quantity) {
            // Implement AJAX call or form submission to update quantity in the cart
            console.log(`Update item ${itemId} to quantity ${quantity}`);
        }
    </script>
@endsection
