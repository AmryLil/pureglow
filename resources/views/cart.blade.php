@extends('layouts.app')

@section('title', 'Cart')

@section('content')
    <div class="px-32 rounded-md mt-20">
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
                            $itemTotal = $item->price_222290 * $item->quantity_222290;
                            $totalPrice += $itemTotal;
                        @endphp
                        <div class="flex items-center hover:bg-gray-100 px-6 py-5">
                            <div class="flex w-2/5">
                                <div class="w-20">
                                    <img class="h-24" src="{{ $item->product->path_img_222290 }}"
                                        alt="{{ $item->product->nama_222290 }}">
                                </div>
                                <div class="flex flex-col justify-between ml-4 flex-grow">
                                    <span class="font-bold text-sm text-slate-950">{{ $item->product->nama_222290 }}</span>
                                    <span class="text-slate-600 text-xs"><strong>Brand Example</strong></span>
                                    <button onclick="removeItemFromCart({{ $item->product_id_222290 }})"
                                        class="font-bold text-sm text-start rounded text-red-500">
                                        Remove
                                    </button>
                                </div>
                            </div>
                            <div class="flex justify-center w-1/5">
                                <input type="number" id="number-input" aria-describedby="helper-text-explanation"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-16 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="90210" value="{{ $item->quantity_222290 }}" min="1"
                                    onchange="updateQuantity({{ $item->id_222290 }}, this.value)" />
                                {{-- <input class="mx-2 border text-center w-8 text-black" type="number"> --}}
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
                    <label for="promo" class="font-semibold inline-block mb-3 text-sm uppercase">Promo Code</label>
                    <input type="text" id="promo" placeholder="Enter your code" class="p-2 text-sm w-full">
                </div>
                <button class="bg-red-500 hover:bg-red-600 px-5 py-2 text-sm text-white uppercase">Apply</button>

                <div class="border-t mt-8">
                    <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                        <span>Total cost</span>
                        <span>RP {{ number_format($totalPrice + 10, 2) }}</span>
                    </div>
                    <div id="pay-button">
                        <button
                            class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full">Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-uWS7H-PNyLQB8VKx"></script>
    <script>
        // Fungsi untuk menghapus item dari cart
        function removeItemFromCart(productId) {
            fetch(`/cart/${productId}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.message === 'Product removed from cart successfully') {
                        alert('Item removed from cart');
                        window.location.reload();
                        // Bisa tambahkan logika untuk mengupdate tampilan cart
                    } else {
                        alert(data.message); // Tampilkan pesan error jika ada
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Failed to remove item from cart');
                });
        }


        document.getElementById('pay-button').onclick = function() {
            const totalAmount = {{ $totalPrice + 10 }}; // Total biaya transaksi termasuk ongkos kirim
            const customerId = {{ session('user_id') }}; // Ambil ID pelanggan yang sedang login
            const name = "{{ session('name') }}"; // Ambil nama pelanggan yang sedang login
            const email = "{{ session('email') }}"; // Ambil email pelanggan yang sedang login

            // Ambil ID produk dari cart
            const productIds = @json($cartItems->pluck('product.id_222290')->toArray()).join(',');

            // Buat transaksi di server
            fetch('/create-transaction', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        amount: totalAmount,
                        first_name: name, // Data pelanggan, bisa diambil dari form atau database
                        email: email,
                        customer_id: customerId // Kirim ID pelanggan ke server
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.snapToken) {
                        window.snap.pay(data.snapToken, {
                            onSuccess: function(result) {
                                alert("Pembayaran berhasil");
                                console.log(result);

                                // Kirim data transaksi ke server dengan status sukses
                                postTransactionData(result, 'success', customerId, productIds);
                            },
                            onPending: function(result) {
                                alert("Menunggu pembayaran");
                                console.log(result);

                                // Kirim data transaksi ke server dengan status pending
                                postTransactionData(result, 'pending', customerId, productIds);
                            },
                            onError: function(result) {
                                alert("Pembayaran gagal");
                                console.log(result);

                                // Kirim data transaksi ke server dengan status gagal
                                postTransactionData(result, 'failed', customerId, productIds);
                            },
                            onClose: function() {
                                alert("Anda menutup popup tanpa menyelesaikan pembayaran");
                            }
                        });
                    } else {
                        console.error(data.error);
                        alert("Terjadi kesalahan saat membuat transaksi.");
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert("Terjadi kesalahan. Silakan coba lagi.");
                });
        };

        function postTransactionData(result, status, customerId, productIds) {
            const transactionData = {
                id_pelanggan: customerId, // ID pelanggan yang sesuai
                order_id: result.order_id, // ID order dari Midtrans
                transaction_id: result.transaction_id, // ID transaksi dari Midtrans
                jumlah: {{ $cartItems->count() }}, // Jumlah produk yang dibeli
                harga_total: {{ $totalPrice + 10 }}, // Total biaya transaksi
                status: status, // Status transaksi
                metode_pembayaran: result.payment_type, // Metode pembayaran yang digunakan
                product_ids: productIds // Tambahkan string ID produk ke data transaksi
            };

            fetch('/store-pending-transaction', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(transactionData)
                })
                .then(response => {
                    if (response.ok) {
                        console.log("Data transaksi " + status + " berhasil disimpan.");
                    } else {
                        console.error("Gagal menyimpan data transaksi " + status + ".");
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
@endsection
