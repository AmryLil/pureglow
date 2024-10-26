<header
    class="flex top-0 justify-between items-center py-4 px-32 bg-white  z-50 bg-gradient-to-r from-cream to-gray-100 w-full fixed">
    {{-- logo --}}
    <div class="text-2xl text-slate-700">
        <img src={{ asset('images/logo.png') }} alt="" class="w-32">
    </div>
    {{-- seacrh --}}
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
                    class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search..." required />

            </div>
        </form>

    </div>
    {{-- menu --}}
    <nav class="space-x-5 text-sm font-bold">
        {{-- buatkan validasi jika sudah login --}}
        <a href="/" class="text-gray-600 hover:text-black">Home</a>
        <a href="/shop" class="text-gray-600 hover:text-black">Shop</a>
        <a href="/categories" class="text-gray-600 hover:text-black">Categories</a>
        <a href="/categories" class="text-gray-600 hover:text-black">About Us</a>

    </nav>

    {{-- auth --}}
    @if (Auth::check())
    @else
        <div class="space-x-2">
            <a href="login" class="text-gray-600 hover:text-black">Log In</a>
            <a href="signup" class="bg-black text-white py-2 px-4 rounded-lg hover:bg-gray-800">Sign Up</a>
        </div>
    @endif


    @if (Auth::check())
        <div class="space-x-8 flex flex-row">

            <a href="/cart" class="w-8">
                <img src="{{ asset('images/carticon.png') }}" alt="">
            </a>
            <div class="font-medium flex justify-center items-center gap-2 relative group">
                <img class="w-7 h-7 rounded-full" src="{{ asset('images/profile.png') }}" alt="">
                <div class="text-sm font-semibold">Jese Leos</div>

                <!-- Dropdown Menu -->
                <div class="absolute right-0 mt-32 hidden bg-white border rounded shadow-lg group-hover:block">
                    <a href="" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profile</a>
                    <a href="" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Settings</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-full text-left block px-4 py-2 text-gray-800 hover:bg-gray-100">Logout</button>
                    </form>
                </div>

            </div>
        </div>
    @endif




</header>
