<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkUp - Authentication</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 font-sans antialiased text-gray-900 min-h-screen flex flex-col justify-between">

<header class="max-w-6xl mx-auto w-full px-6 py-6">
    <a href="/" class="text-blue-600 font-black text-3xl tracking-wider">
        Link<span class="bg-blue-600 text-white px-1.5 rounded ml-0.5 text-2xl">Up</span>
    </a>
</header>

<main class="flex-1 flex flex-col items-center justify-center px-4 pb-12">
    @yield('content')
</main>

<footer class="py-4 border-t border-gray-200 bg-white">
    <div class="max-w-6xl mx-auto px-4 text-center text-xs text-gray-400">
        <p>&copy; 2026 LinkUp Corporation. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
