<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
    type="button"
    class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
        </path>
    </svg>
</button>

<aside id="default-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-800">
        <div class="bg-white p-2 rounded-lg flex justify-center items-center">
            <div class="text-2xl text-slate-700">
                <img src="{{ asset('images/logo1.png') }}" alt="" class="w-40 ">
            </div>
        </div>
        <ul class="space-y-2 font-medium mt-3">
            <x-dashboard.menulink path="/dashboard">Dashboard</x-dashboard.menulink>
            <x-dashboard.menulink svg="" path="/dashboard/produk">Produk</x-dashboard.menulink>
            <x-dashboard.menulink path="{{ route('dashboard.kategori.index') }}">Kategori</x-dashboard.menulink>
            <x-dashboard.menulink path="#">User Management</x-dashboard.menulink>
            {{-- <x-dashboard.menulink path="#">Logout</x-dashboard.menulink> --}}

        </ul>

    </div>

</aside>
