@extends('layouts.app')

@section('title', 'Edit Profile - LinkUp')

@section('content')
    <div class="container mx-auto max-w-2xl py-8 px-4">
        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4">
                <i class="fa-regular fa-check-circle mr-2"></i>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4">
                <i class="fa-regular fa-circle-exclamation mr-2"></i>
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200">
            <!-- Header -->
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <h1 class="text-2xl font-bold text-gray-900">Edit Profile</h1>
                <p class="text-sm text-gray-500 mt-1">Update your professional information</p>
            </div>

            <form action="{{ route('profile.update') }}" method="POST" class="p-6">
                @csrf
                @method('PUT')

                <!-- Current Avatar Preview -->
                <div class="flex items-center gap-4 mb-6 pb-6 border-b border-gray-100">
                    <img src="{{ $user->image_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&size=64&background=2563eb&color=fff' }}"
                         alt="{{ $user->name }}"
                         class="w-16 h-16 rounded-full object-cover border-2 border-gray-200">
                    <div>
                        <h3 class="font-semibold text-gray-900">{{ $user->name }}</h3>
                        <p class="text-xs text-gray-500">{{ $user->email }}</p>
                        <p class="text-xs text-gray-400 mt-1">Member since {{ $user->created_at->format('F Y') }}</p>
                    </div>
                </div>

                <!-- Headline -->
                <div class="mb-4">
                    <label for="headline" class="block text-sm font-semibold text-gray-700 mb-1">
                        Professional Headline <span class="text-red-500">*</span>
                    </label>
                    <input type="text"
                           name="headline"
                           id="headline"
                           value="{{ old('headline', $user->headline) }}"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('headline') border-red-500 @enderror"
                           placeholder="e.g. Fullstack Developer at Google"
                           required>
                    @error('headline')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-xs text-gray-400 mt-1">Your professional title that appears next to your name</p>
                </div>

                <!-- Company -->
                <div class="mb-4">
                    <label for="company" class="block text-sm font-semibold text-gray-700 mb-1">
                        Company
                    </label>
                    <input type="text"
                           name="company"
                           id="company"
                           value="{{ old('company', $user->company) }}"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('company') border-red-500 @enderror"
                           placeholder="e.g. Google, Microsoft">
                    @error('company')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-xs text-gray-400 mt-1">Your current employer (optional)</p>
                </div>

                <!-- Image URL -->
                <div class="mb-4">
                    <label for="image_url" class="block text-sm font-semibold text-gray-700 mb-1">
                        Profile Image URL
                    </label>
                    <input type="url"
                           name="image_url"
                           id="image_url"
                           value="{{ old('image_url', $user->image_url) }}"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('image_url') border-red-500 @enderror"
                           placeholder="https://example.com/avatar.jpg">
                    @error('image_url')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-xs text-gray-400 mt-1">
                        <i class="fa-regular fa-info-circle mr-1"></i>
                        Enter a direct URL to your profile image (e.g., from Gravatar or Imgur)
                    </p>
                </div>

                <!-- Image Upload (Alternative) -->
                <div class="mb-6 p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fa-regular fa-image mr-1"></i>
                        Or Upload an Image
                    </label>
                    <form action="{{ route('profile.image.upload') }}" method="POST" enctype="multipart/form-data" class="flex flex-col sm:flex-row items-start sm:items-center gap-3">
                        @csrf
                        <div class="flex-1 w-full">
                            <input type="file"
                                   name="image"
                                   accept="image/*"
                                   class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            <p class="text-xs text-gray-400 mt-1">Supported: JPG, PNG, GIF (Max 2MB)</p>
                        </div>
                        <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm transition whitespace-nowrap">
                            <i class="fa-regular fa-upload mr-1"></i>
                            Upload
                        </button>
                    </form>
                    @error('image')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Buttons -->
                <div class="flex flex-col sm:flex-row justify-between items-center gap-3 pt-4 border-t border-gray-200">
                    <a href="{{ route('profile.show', $user) }}"
                       class="text-gray-500 hover:text-gray-700 text-sm font-semibold transition">
                        <i class="fa-regular fa-arrow-left mr-1"></i> Cancel
                    </a>
                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg text-sm font-semibold transition w-full sm:w-auto">
                        <i class="fa-regular fa-floppy-disk mr-2"></i>
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
