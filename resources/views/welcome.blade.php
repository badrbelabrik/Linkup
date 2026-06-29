<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkUp - Welcome to your professional community</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-white font-sans antialiased text-gray-900 min-h-screen flex flex-col justify-between">

<header class="max-w-6xl mx-auto w-full px-4 py-4 flex justify-between items-center">
    <a href="/" class="text-blue-600 font-black text-3xl tracking-wider">
        Link<span class="bg-blue-600 text-white px-1.5 rounded ml-0.5 text-2xl">Up</span>
    </a>

    <div class="flex items-center space-x-4">
        <a href="#" class="text-gray-600 hover:text-gray-900 font-semibold text-base px-4 py-2 rounded-full hover:bg-gray-100 transition duration-200">
            Join now
        </a>
        <a href="#" class="text-blue-600 hover:text-blue-700 font-semibold text-base px-5 py-2 rounded-full border border-blue-600 hover:border-blue-700 hover:bg-blue-50 transition duration-200">
            Sign in
        </a>
    </div>
</header>

<main class="max-w-6xl mx-auto w-full px-4 flex flex-col lg:flex-row items-center my-auto py-12 gap-12">

    <div class="w-full lg:w-1/2 space-y-6 text-center lg:text-left">
        <h1 class="text-4xl md:text-5xl font-light text-amber-800 leading-tight">
            Welcome to your <span class="font-medium text-blue-600">professional community</span>
        </h1>
        <p class="text-lg text-gray-500 max-w-lg mx-auto lg:mx-0">
            Connect with developers, share your Laravel projects, and accelerate your career on LinkUp.
        </p>

        <div class="pt-4">
            <a href="#" class="inline-flex items-center space-x-3 bg-blue-600 hover:bg-blue-700 text-white font-medium text-lg px-8 py-3.5 rounded-full shadow-md hover:shadow-lg transition duration-200 w-full sm:w-auto justify-center">
                <span>Get Started</span>
                <i class="fa-solid fa-arrow-right text-sm"></i>
            </a>
        </div>
    </div>

    <div class="w-full lg:w-1/2 flex justify-center">
        <img src="https://illustrations.popsy.co/amber/work-from-home.svg"
             alt="LinkUp professional community illustration"
             class="w-full max-w-md md:max-w-lg object-contain transform lg:scale-110">
    </div>

</main>

<footer class="bg-gray-100 py-4 border-t border-gray-200">
    <div class="max-w-6xl mx-auto px-4 text-center text-xs text-gray-500">
        <p>&copy; 2026 LinkUp Corporation. Built for educational brief purposes.</p>
    </div>
</footer>

</body>
</html>
