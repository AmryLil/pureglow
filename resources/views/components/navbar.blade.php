<header
    class="flex top-0 justify-between items-center py-4 px-32 bg-white z-50 bg-gradient-to-r from-cream to-gray-100 w-full fixed">
    {{-- logo --}}
    <div class="text-2xl text-slate-700">
        <img src="{{ asset('images/logo1.png') }}" alt="" class="w-[140px]">
    </div>

    {{-- search --}}
    <div class="w-72">
        <form class="w-full mx-auto">
            <label for="default-search"
                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="default-search"
                    class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Search..." required />
            </div>
        </form>
    </div>

    {{-- menu --}}
    <nav class="space-x-5 text-sm font-bold">
        <a href="/" class="text-gray-900 hover:text-black">Home</a>
        <a href="/shop" class="text-gray-900 hover:text-black">Shop</a>
        <a href="/kategori" class="text-gray-900 hover:text-black">Categori</a>
        <a href="/about" class="text-gray-900 hover:text-black">About Us</a>
    </nav>

    {{-- auth --}}
    @if (Auth::check())
        {{-- Jika pengguna sudah login --}}
        <div class="flex-none">
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                    <div class="indicator">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span class="badge badge-sm indicator-item">8</span>
                    </div>
                </div>
                <div tabindex="0" class="card card-compact dropdown-content bg-base-100 z-[1] mt-3 w-52 shadow">
                    <div class="card-body">
                        <span class="text-lg font-bold">8 Items</span>
                        <span class="">Subtotal: Rp 300.000</span>
                        <div class="card-actions">
                            <a href="/cart">
                                <button class="btn btn-primary btn-block">Lihat Cart</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img alt="Tailwind CSS Navbar component"
                            src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
                    </div>
                </div>
                <ul tabindex="0"
                    class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                    <li>
                        <a class="justify-between">
                            Profile
                            <span class="badge">New</span>
                        </a>
                    </li>
                    <li><a>Settings</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full text-left ">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    @else
        {{-- Jika pengguna belum login --}}
        <div class="space-x-2">
            <a href="/login" class="text-gray-900 hover:text-black">Log In</a>
            <a href="/signup" class="bg-black text-white py-2 px-4 rounded-lg hover:bg-gray-800">Sign Up</a>
        </div>
    @endif
</header>
