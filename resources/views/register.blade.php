@extends('layouts.auth')

@section('content')
    <div class="w-full max-w-lg bg-white rounded-lg shadow-md border border-gray-200 p-6 md:p-8">
        <div class="mb-6 text-center lg:text-left">
            <h1 class="text-2xl md:text-3xl font-semibold text-gray-900">Make the most of your professional life</h1>
        </div>

        <form action="{{route('register')}}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                <input type="text" id="name" name="name" required autocomplete="name" autofocus placeholder="e.g., John Doe"
                       value="{{old('name')}}" class="w-full px-3 py-2 border border-gray-400 rounded focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600 text-sm">
                @error('name')
                <p class="text-red-600 text-xs font-semibold mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email address</label>
                <input type="email" id="email" name="email" required autocomplete="email"
                       value="{{old('email')}}" class="w-full px-3 py-2 border border-gray-400 rounded focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600 text-sm">
                @error('email')
                <p class="text-red-600 text-xs font-semibold mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="headline" class="block text-sm font-medium text-gray-700 mb-1">Professional Headline</label>
                <input type="text" id="headline" name="headline" required placeholder="e.g., Fullstack Developer"
                       value="{{old('headline')}}" class="w-full px-3 py-2 border border-gray-400 rounded focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600 text-sm">
                @error('headline')
                <p class="text-red-600 text-xs font-semibold mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="company" class="block text-sm font-medium text-gray-700 mb-1">Company <span class="text-xs text-gray-400">(Optional)</span></label>
                    <input type="text" id="company" name="company" placeholder="e.g., Acme Corp"
                           value="{{old('company')}}" class="w-full px-3 py-2 border border-gray-400 rounded focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600 text-sm">
                    @error('company')
                    <p class="text-red-600 text-xs font-semibold mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="image_url" class="block text-sm font-medium text-gray-700 mb-1">Profile Image URL</label>
                    <input type="url" id="image_url" name="image_url" placeholder="https://example.com/avatar.jpg"
                           value="{{old('image_url')}}" class="w-full px-3 py-2 border border-gray-400 rounded focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600 text-sm">
                    @error('image_url')
                    <p class="text-red-600 text-xs font-semibold mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password (8+ characters)</label>
                <input type="password" id="password" name="password" required autocomplete="new-password"
                       class="w-full px-3 py-2 border border-gray-400 rounded focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600 text-sm">
                @error('password')
                <p class="text-red-600 text-xs font-semibold mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Password confirmation</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password"
                       class="w-full px-3 py-2 border border-gray-400 rounded focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600 text-sm">
                @error('password_confirmation')
                <p class="text-red-600 text-xs font-semibold mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</p>
                @enderror
            </div>

            <p class="text-xs text-center text-gray-500 py-2">
                By clicking Agree & Join, you agree to the LinkUp User Agreement, Privacy Policy, and Cookie Policy.
            </p>

            <div>
                <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-full shadow-sm transition duration-150 text-base">
                    Agree & Join
                </button>
            </div>
        </form>

        <div class="mt-6 pt-4 border-t border-gray-100 text-center text-sm text-gray-600">
            Already on LinkUp?
            <a href="{{route('show.login')}}" class="font-semibold text-blue-600 hover:underline ml-1">Sign in</a>
        </div>
    </div>
@endsection
