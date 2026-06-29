@extends('layouts.auth')

@section('content')
    <div class="w-full max-w-md bg-white rounded-lg shadow-md border border-gray-200 p-6 md:p-8">
        <div class="mb-6">
            <h1 class="text-3xl font-semibold text-gray-900">Sign in</h1>
            <p class="text-sm text-gray-500 mt-1">Stay updated on your professional world</p>
        </div>

        <form action="{{route('login')}}" method="POST" class="space-y-4">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email address</label>
                <input type="email" id="email" name="email" required autocomplete="email" autofocus
                       value="{{old('email')}}" class="w-full px-3 py-2.5 border border-gray-400 rounded focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600 text-sm">
                @error('email')
                <p class="text-red-600 text-xs font-semibold mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <div class="flex justify-between items-center mb-1">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <a href="#" class="text-sm font-semibold text-blue-600 hover:underline hover:text-blue-800">Forgot password?</a>
                </div>
                <input type="password" id="password" name="password" required autocomplete="current-password"
                       class="w-full px-3 py-2.5 border border-gray-400 rounded focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600 text-sm">
                @error('password')
                <p class="text-red-600 text-xs font-semibold mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}</p>
                @enderror
            </div>

            @if($errors->any())
                <ul class="px-4 py-2 bg-red-100">
                    @foreach($errors->all() as $error)
                        <li class="text-red-600 text-xs font-semibold mt-1"><i class="fa-solid fa-circle-exclamation mr-1"></i>{{$error}}</li>
                    @endforeach
                </ul>
            @endif

            <div class="pt-2">
                <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-full shadow-sm transition duration-150 text-base">
                    Sign in
                </button>
            </div>
        </form>

        <div class="mt-8 pt-4 border-t border-gray-100 text-center text-sm text-gray-600">
            New to LinkUp?
            <a href="{{route('show.register')}}" class="font-semibold text-blue-600 hover:underline ml-1">Join now</a>
        </div>
    </div>
@endsection
