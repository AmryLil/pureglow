<header class="flex items-center justify-between px-5 py-4  sm:ml-64 ">
    <h1 class="text-3xl font-bold text-gray-800">{{ $slot }}<span class="text-indigo-700">.</span></h1>

    <div class=" flex gap-2">
        <div class="relative">
            <input type="text" placeholder="Search"
                class="pl-4 pr-12 py-2 text-gray-700 bg-gray-100 rounded-full focus:outline-none focus:ring-2 focus:ring-indigo-700">
            <button
                class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-indigo-600 text-white p-2 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 16l-4-4m0 0l4-4m-4 4h12" />
                </svg>
            </button>
        </div>

        <div class="flex items-center space-x-4">
            <!-- User Info -->
            <div class="flex items-center space-x-2">
                <img class="h-10 w-10 rounded-full object-cover" src="https://via.placeholder.com/150"
                    alt="User avatar">
                <span class="text-gray-700 font-medium">Admin 1</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </div>


        </div>
    </div>
</header>
