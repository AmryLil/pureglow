<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>

<body class="bg-slate-100">

    <div class="flex items-center justify-center h-screen w-full bg-slate-100">
        <svg width="100%" height="100%" id="svg" viewBox="0 0 1440 667" xmlns="http://www.w3.org/2000/svg"
            class="transition duration-300 ease-in-out delay-150">
            <path
                d="M 0,700 L 0,262 C 56.19025773831545,230.5672216056234 112.3805154766309,199.13444321124678 171,234 C 229.6194845233691,268.8655567887532 290.6681958317919,370.02944876063634 348,372 C 405.3318041682081,373.97055123936366 458.94670119620173,276.7477617462079 509,323 C 559.0532988037983,369.2522382537921 605.5449993834012,558.979504254532 653,596 C 700.4550006165988,633.020495745468 748.8733012701936,517.3342212356641 800,513 C 851.1266987298064,508.66577876433587 904.9617955358244,615.6836108028116 965,646 C 1025.0382044641756,676.3163891971884 1091.2795165865089,629.9313355530893 1142,665 C 1192.7204834134911,700.0686644469107 1227.9201381181404,816.5910469848316 1275,863 C 1322.0798618818596,909.4089530151684 1381.03993094093,885.7044765075842 1440,862 L 1440,700 L 0,700 Z"
                stroke="none" stroke-width="0" fill="#111827" fill-opacity="1"
                class="transition-all duration-300 ease-in-out delay-150 path-0" transform="rotate(-180 720 350)">
            </path>
        </svg>
        <!-- Login Container -->
        <div class="absolute top-20 min-w-fit flex-col border bg-white px-6 py-14 shadow-md rounded-[4px] ">
            <div class="mb-4 flex justify-center">
                <img class="w-32" src="{{ asset('images/logo1.png') }}" alt="Logo" />
            </div>
            <div class="text-center text-xl font-bold text-slate-900 mb-5">
                Enter your Account
            </div>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="mb-4 text-red-500">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="flex flex-col text-sm rounded-md">
                    <input
                        class="mb-5 rounded-[4px] border p-3 hover:outline-none focus:outline-none hover:border-indigo-800"
                        type="text" name="email_222290" placeholder="Username or Email" required />
                    <input
                        class="border rounded-[4px] p-3 hover:outline-none focus:outline-none hover:border-indigo-800"
                        type="password" name="password_222290" placeholder="Password" required />
                </div>
                <button
                    class="mt-5 w-full border p-2 bg-indigo-700 text-white rounded-[4px] hover:bg-indigo-800 duration-300 font-bold"
                    type="submit">Sign in</button>
            </form>
            <div class="mt-1 flex justify-between text-sm text-gray-900">
                <a href="#">Forgot password?</a>
                <a href="{{ route('signup') }}">Sign up</a>
            </div>

            <div class="flex justify-center mt-2 text-sm py-2 border rounded-sm gap-2">
                <img src="{{ asset('images/google.png') }}" alt="google" class="w-5 h-5">
                <div class="font-semibold text-blue-600">Sign in with Google</div>
            </div>

            <div class="mt-5 flex text-center text-sm text-gray-400">
                <p>
                    This site is protected by reCAPTCHA and the Google <br />
                    <a class="underline" href="">Privacy Policy</a> and <a class="underline" href="">Terms
                        of Service</a> apply.
                </p>
            </div>
        </div>
    </div>
</body>

</html>
