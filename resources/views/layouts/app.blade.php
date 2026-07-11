<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkUp - Connecting Professionals</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100 font-sans antialiased text-gray-900">

<nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
    <div class="max-w-6xl mx-auto px-4 flex justify-between items-center h-14">
        <div class="flex items-center space-x-2 flex-1">
            <a href="{{ route('feed') }}" class="text-blue-600 font-black text-2xl tracking-wider">Link<span class="bg-blue-600 text-white px-1 rounded ml-0.5 text-xl">Up</span></a>
            <div class="relative w-64 hidden md:block">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </span>
                <input type="text" placeholder="Search..." class="w-full bg-slate-100 text-sm pl-9 pr-3 py-1.5 rounded focus:outline-none focus:ring-1 focus:ring-blue-600 border border-transparent focus:bg-white">
            </div>
        </div>

        <div class="flex items-center space-x-6 text-gray-500 text-xs">
            <a href="{{ route('feed') }}" class="flex flex-col items-center text-gray-900 border-b-2 border-gray-900 px-1 py-1">
                <i class="fa-solid fa-house text-xl mb-0.5"></i>
                <span class="hidden sm:block">Home</span>
            </a>
            <a href="#" class="flex flex-col items-center hover:text-gray-900 px-1 py-1 transition">
                <i class="fa-solid fa-users text-xl mb-0.5"></i>
                <span class="hidden sm:block">My Network</span>
            </a>
            <a href="#" class="flex flex-col items-center hover:text-gray-900 px-1 py-1 transition">
                <i class="fa-solid fa-briefcase text-xl mb-0.5"></i>
                <span class="hidden sm:block">Jobs</span>
            </a>
            <a href="#" class="flex flex-col items-center hover:text-gray-900 px-1 py-1 transition">
                <i class="fa-solid fa-message text-xl mb-0.5"></i>
                <span class="hidden sm:block">Messaging</span>
            </a>

            <div class="border-l border-gray-200 h-8 mx-2 hidden sm:block"></div>

            <div class="relative" x-data="{ open: false }" @click.away="open = false">
                <button @click="open = !open" class="flex flex-col items-center hover:text-gray-900 px-1 py-1 transition focus:outline-none cursor-pointer">
                    <img src="https://via.placeholder.com/150" alt="Profile" class="w-5 h-5 rounded-full object-cover mb-0.5">
                    <span class="hidden sm:block">Me <i class="fa-solid fa-caret-down text-[10px]" :class="{ 'transform rotate-180': open }"></i></span>
                </button>

                <div x-show="open"
                     x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="transform opacity-0 scale-95"
                     x-transition:enter-end="transform opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="transform opacity-100 scale-100"
                     x-transition:leave-end="transform opacity-0 scale-95"
                     class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg py-1 z-50 text-sm font-normal text-gray-700"
                     style="display: none;">

                    <a class="nav-link" href="{{ route('profile.show', auth()->user()) }}">
                        <i class="fas fa-user"></i>
                        <span>Profile</span>
                    </a>

                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 text-left transition">View Profile</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 text-left transition">Settings & Privacy</a>

                    <div class="border-t border-gray-100 my-1"></div>

                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-red-50 transition cursor-pointer font-medium">
                            <i class="fa-solid fa-arrow-right-from-bracket mr-2 text-xs"></i>Sign Out
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</nav>

<main class="max-w-6xl mx-auto px-4 py-6">
    @yield('content')
</main>

</body>
</html>
