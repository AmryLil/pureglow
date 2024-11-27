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

                        <div class="flex items-center space-x-4">
                            <div class="text-lg font-semibold">Quantity</div>
                            <input id="qty" type="number" value="1" min="1"
                                class="border p-2 text-center w-16 text-base font-semibold rounded" />
                        </div>
                        <div class="mt-6 text-base">
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
                            <button id="co" onclick="showPaymentModal()"
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
        </div>

        <!-- Payment Modal -->
        <div id="payment-modal"
            class="fixed z-50 inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center overflow-auto">
            <div class="bg-white rounded-lg w-1/3 p-5">
                <h2 class="text-xl font-bold mb-4">Transfer Bank</h2>
                <p>Silakan transfer jumlah total ke rekening bank berikut:</p>
                <div class="my-4">
                    <strong>Nama Bank: BCA</strong><br>
                    <strong>No. Rekening: 1234567890</strong><br>
                    <strong>Nama Pemilik Rekening: PT. MaskGlow</strong>
                </div>

                <div class="border-t my-4 py-2">
                    <h3 class="font-semibold">Barang yang Dibeli:</h3>
                    <ul class="list-disc list-inside">
                        <li>{{ $product->nama_222290 }}</li>
                    </ul>
                </div>

                <div class="flex justify-between font-bold mt-4">
                    <span>Total:</span>
                    <span>Rp {{ $product->harga_222290 }}</span>
                </div>

                <form id="upload-receipt-form" enctype="multipart/form-data" class="mt-4">
                    <label class="block mb-2">Unggah Bukti Pembayaran:</label>
                    <input type="file" name="receipt" id="receipt" class="border p-2 w-full" accept="image/*" required
                        onchange="previewReceipt()">
                </form>

                <div id="receipt-preview" class="mt-4 hidden">
                    <h3 class="font-semibold mb-2">Pratinjau Bukti Pembayaran:</h3>
                    <img id="receipt-image" src="" alt="Bukti Pembayaran" class="w-full rounded shadow-lg">
                </div>

                <div class="flex justify-end mt-5">
                    <button onclick="closePaymentModal()"
                        class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded mr-2">Tutup</button>
                    <button onclick="submitPaymentProof()"
                        class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded">Kirim</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Toggle Modal
        function toggleModal(modalId, show = true) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden', !show);
        }

        function showPaymentModal() {
            if (!isUserLoggedIn()) {
                // Jika pengguna belum login, arahkan ke halaman login
                window.location.href = "{{ route('login') }}";
                return; // Hentikan eksekusi fungsi
            }
            document.getElementById('payment-modal').classList.remove('hidden');
        }

        function closePaymentModal() {
            document.getElementById('payment-modal').classList.add('hidden');
        }

        // Quantity Controls
        document.querySelectorAll('.quantity-control').forEach(button => {
            button.addEventListener('click', function() {
                const qtyElement = document.getElementById('qty');
                let qty = parseInt(qtyElement.innerText);
                if (this.id === 'increment') qtyElement.innerText = ++qty;
                else if (this.id === 'decrement' && qty > 1) qtyElement.innerText = --qty;
            });
        });

        // Pengecekan login
        function isUserLoggedIn() {
            return {{ auth()->check() ? 'true' : 'false' }}; // Mengecek login di sisi server
        }

        // Add to Cart
        document.getElementById('add-to-cart').addEventListener('click', function() {
            if (!isUserLoggedIn()) {
                window.location.href = "{{ route('login') }}";
                return;
            }

            const qty = parseInt(document.getElementById('qty').value);
            const productId = {{ $product->id_222290 }};

            if (isNaN(qty) || qty < 1) {
                alert('Quantity harus minimal 1.');
                return;
            }

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
                .then(response => response.json())
                .then(() => document.getElementById('my_modal_3').showModal())
                .catch(console.error);
        });


        // Receipt Preview
        function previewReceipt() {
            const receiptInput = document.getElementById('receipt');
            const receiptPreview = document.getElementById('receipt-preview');
            const receiptImage = document.getElementById('receipt-image');

            if (receiptInput.files[0]) {
                const reader = new FileReader();
                reader.onload = e => {
                    receiptImage.src = e.target.result;
                    receiptPreview.classList.remove('hidden');
                };
                reader.readAsDataURL(receiptInput.files[0]);
            } else {
                receiptPreview.classList.add('hidden');
            }
        }

        // Submit Payment Proof
        async function submitPaymentProof() {
            if (!isUserLoggedIn()) {
                // Jika pengguna belum login, arahkan ke halaman login
                window.location.href = "{{ route('login') }}";
                return; // Hentikan eksekusi fungsi
            }

            const formData = new FormData(document.getElementById('upload-receipt-form'));
            const productId = {{ $product->id_222290 }};
            const quantity = document.getElementById('qty').value;

            formData.append('product_id', productId);
            formData.append('quantity', quantity);

            try {
                const response = await fetch(`{{ route('checkout.single', ':productId') }}`.replace(':productId',
                    productId), {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData,
                });

                if (response.ok) {
                    alert('Payment proof submitted successfully!');
                    toggleModal('payment-modal', false);
                    window.location.reload();
                } else {
                    const errorData = await response.json();
                    alert(`Failed to submit payment proof: ${errorData.message}`);
                    window.location.reload();
                }
            } catch (error) {
                console.error(error);
                alert('Error submitting payment proof.');
            }
        }
    </script>
@endsection
