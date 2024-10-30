<header class="flex items-center justify-between px-5 py-1  sm:ml-64 ">


    <header class="w-full flex items-center justify-between p-4 bg-white shadow">
        <input type="text" placeholder="Type to search..." class="w-1/3 p-2 border border-gray-300 rounded">
        <div class="flex items-center space-x-4">
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
    </header>
</header>
