<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkUp - Connecter les Professionnels</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans antialiased test-gray-900">

<nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
    <div class="max-w-6xl mx-auto px-4 flex justify-between items-center h-14">
        <div class="flex items-center space-x-2 flex-1">
            <a href="#" class="text-blue-600 font-black text-2xl tracking-wider">Link<span class="bg-blue-600 text-white px-1 rounded ml-0.5 text-xl">Up</span></a>
            <div class="relative w-64 hidden md:block">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </span>
                <input type="text" placeholder="Recherche..." class="w-full bg-slate-100 text-sm pl-9 pr-3 py-1.5 rounded focus:outline-none focus:ring-1 focus:ring-blue-600 border border-transparent focus:bg-white">
            </div>
        </div>

        <div class="flex items-center space-x-6 text-gray-500 text-xs">
            <a href="#" class="flex flex-col items-center text-gray-900 border-b-2 border-gray-900 px-1 py-1">
                <i class="fa-solid fa-house text-xl mb-0.5"></i>
                <span class="hidden sm:block">Accueil</span>
            </a>
            <a href="#" class="flex flex-col items-center hover:text-gray-900 px-1 py-1 transition">
                <i class="fa-solid fa-users text-xl mb-0.5"></i>
                <span class="hidden sm:block">Réseau</span>
            </a>
            <a href="#" class="flex flex-col items-center hover:text-gray-900 px-1 py-1 transition">
                <i class="fa-solid fa-briefcase text-xl mb-0.5"></i>
                <span class="hidden sm:block">Emplois</span>
            </a>
            <a href="#" class="flex flex-col items-center hover:text-gray-900 px-1 py-1 transition">
                <i class="fa-solid fa-message text-xl mb-0.5"></i>
                <span class="hidden sm:block">Messagerie</span>
            </a>
            <div class="border-l border-gray-200 h-8 mx-2 hidden sm:block"></div>
            <a href="#" class="flex flex-col items-center hover:text-gray-900 px-1 py-1 transition">
                <img src="https://via.placeholder.com/150" alt="Profile" class="w-5 h-5 rounded-full object-cover mb-0.5">
                <span class="hidden sm:block">Vous <i class="fa-solid fa-caret-down text-[10px]"></i></span>
            </a>
        </div>
    </div>
</nav>

<main class="max-w-6xl mx-auto px-4 py-6">
    @yield('content')
</main>

</body>
</html>
