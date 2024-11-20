@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="w-full mt-20 px-32">
        <div class="bg-white p-2 rounded-lg shadow-md gap-2">
            <div class="flex">
                <!-- Product Image -->
                <div class="w-1/2 flex justify-center relative h-[80vh]">
                    <img src="{{ Str::startsWith($product->path_img_222290, 'http') ? $product->path_img_222290 : asset('storage/images/' . $product->path_img_222290) }}"
                        alt="Product Image" class="object-cover h-full">
                </div>

                <!-- Product Details -->
                <div class="w-1/2 flex flex-col p-2 justify-between px-6">
                    <div class="text-start mt-2">
                        <h1 class="text-4xl font-bold">{{ $product->nama_222290 }}</h1>
                        <p class="text-xl text-gray-900 font-light mt-2">Product Categories</p>
                        <div class="h-0.5 w-full bg-slate-900 mt-3"></div>
                    </div>

                    <!-- Product Specs -->
                    <div>
                        <div class="mt-6 text-base">
                            <p class="text-xl text-gray-900 font-light">Description</p>
                            <p class="text-lg">{{ $product->deskripsi_222290 }}</p>
                        </div>

                        <div class="flex justify-start mt-5 items-center space-x-4">
                            <!-- Quantity Controls -->
                            <div class="text-lg font-semibold">Quantity</div>
                            <div class="flex gap-2">
                                <button id="decrement"
                                    class="bg-gray-200 text-gray-800 font-bold rounded-sm h-6 w-6 flex justify-center items-center hover:bg-gray-300">-</button>
                                <span id="qty" class="text-base font-semibold">1</span>
                                <button id="increment"
                                    class="bg-gray-200 text-gray-800 font-bold rounded-sm h-6 w-6 flex justify-center items-center hover:bg-gray-300">+</button>
                            </div>
                        </div>
                        <div class="mt-6 text-base ">
                            <p class="text-xl text-gray-900 font-light">Jumlah</p>
                            <p class="text-lg font-bold">{{ $product->jumlah_222290 }} Barang</p>
                        </div>
                    </div>

                    <!-- Price -->
                    <div>
                        <div class="mt-6 text-start">
                            <p class="text-5xl font-bold">Rp {{ number_format($product->harga_222290, 0, ',', '.') }}</p>
                        </div>

                        <!-- Add to Cart Button -->
                        <div class="mt-2 mb-2 flex justify-center w-full gap-2">
                            <button id="pay-button"
                                class="bg-black text-white py-2 px-4 rounded-md hover:bg-gray-900 w-[80%]">
                                Checkout Now
                            </button>
                            <button id="add-to-cart" class="w-[20%] bg-black justify-center flex rounded-md">
                                <img src="{{ asset('images/carts.png') }}" alt="" class="h-12">
                            </button>
                        </div>

                        <!-- Modal -->
                        <dialog id="my_modal_3" class="modal">
                            <div class="modal-box">
                                <form method="dialog">
                                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                </form>
                                <h3 class="text-lg font-bold">Keranjang Info</h3>
                                <p class="py-4">Produk Berhasil Ditambahkan</p>
                            </div>
                        </dialog>
                    </div>
                </div>
            </div>

            {{-- Another Product Section --}}
            {{-- <div>
                <div class="flex justify-center items-center">
                    <div class="h-0.5 bg-black w-full mt-10"></div>
                    <h2 class="text-2xl font-semibold mt-10 text-center w-[800px]">ANOTHER PRODUCTS</h2>
                    <div class="h-0.5 bg-black w-full mt-10"></div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Handle Increment and Decrement for Quantity
        document.getElementById('increment').addEventListener('click', function() {
            let qty = parseInt(document.getElementById('qty').innerText);
            document.getElementById('qty').innerText = ++qty;
            document.getElementById('inputQty').value = qty;
        });

        document.getElementById('decrement').addEventListener('click', function() {
            let qty = parseInt(document.getElementById('qty').innerText);
            if (qty > 1) {
                document.getElementById('qty').innerText = --qty;
                document.getElementById('inputQty').value = qty;
            }
        });

        // Handle Add to Cart via AJAX
        document.getElementById('add-to-cart').addEventListener('click', function() {
            let qty = parseInt(document.getElementById('qty').innerText);
            let productId = {{ $product->id_222290 }}; // Ambil ID produk dari Blade

            fetch(`{{ route('cart.add', ':id') }}`.replace(':id', productId), {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        quantity: qty
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log(data);
                    document.getElementById('my_modal_3').showModal(); // Tampilkan modal
                })
                .catch((error) => {
                    console.error('There has been a problem with your fetch operation:', error);
                });
        });
    </script>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-uWS7H-PNyLQB8VKx"></script>
    <script>
        document.getElementById('pay-button').onclick = function() {

            const totalAmount = {{ $product->harga_222290 }}; // Total biaya transaksi termasuk ongkos kirim
            const customerId = {{ session('user_id') }}; // Ambil ID pelanggan yang sedang login
            const name = "{{ session('name') }}"; // Ambil nama pelanggan yang sedang login
            const email = "{{ session('email') }}"; // Ambil email pelanggan yang sedang login

            // Ambil ID produk dari cart
            const productIds = {{ $product->count() }};
            console.log(productIds, totalAmount)


            // Buat transaksi di server
            fetch('/create-transaction', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        amount: totalAmount,
                        first_name: name,
                        email: email,
                        customer_id: customerId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.snapToken) {
                        window.snap.pay(data.snapToken, {
                            onSuccess: function(result) {
                                alert("Pembayaran berhasil");
                                console.log(result);
                                postTransactionData(result, 'success', customerId, productIds);
                            },
                            onPending: function(result) {
                                alert("Menunggu pembayaran");
                                console.log(result);
                                postTransactionData(result, 'pending', customerId, productIds);
                            },
                            onError: function(result) {
                                alert("Pembayaran gagal");
                                console.log(result);
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
            let qty = parseInt(document.getElementById('qty').innerText);
            console.log("qty : " +
                qty)
            const totalAmount = {{ $product->harga_222290 }}; // Total biaya transaksi termasuk ongkos kirim

            const transactionData = {
                id_pelanggan: customerId,
                order_id: result.order_id,
                transaction_id: result.transaction_id,
                jumlah: qty,
                harga_total: totalAmount,
                status: status,
                metode_pembayaran: result.payment_type,
                product_ids: productIds + ''
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
