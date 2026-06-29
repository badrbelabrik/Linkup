@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

        <div class="hidden lg:block lg:col-span-1">
            <div class="bg-white rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                <div class="h-16 bg-blue-600"></div>
                <div class="px-4 pb-4 text-center -mt-8">
                    <img src="https://via.placeholder.com/150" alt="Avatar" class="w-16 h-16 rounded-full border-2 border-white mx-auto object-cover bg-white">
                    <h2 class="font-bold text-gray-800 mt-2">Logged In User</h2>
                    <p class="text-xs text-gray-500 mt-1">Developer open to work</p>
                </div>
            </div>
        </div>

        <div class="col-span-1 lg:col-span-2 space-y-4">

            <div class="bg-white rounded-lg border border-gray-200 p-4 shadow-sm">
                <div class="flex items-center space-x-2">
                    <img src="https://via.placeholder.com/150" alt="Avatar" class="w-12 h-12 rounded-full object-cover">
                    <button class="flex-1 text-left bg-gray-100 hover:bg-gray-200 text-gray-500 font-semibold py-3 px-4 rounded-full border border-gray-200 text-sm transition">
                        Start a post...
                    </button>
                </div>
            </div>

            @forelse($posts as $post)
                <div class="bg-white rounded-lg border border-gray-200 shadow-sm p-4">

                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center space-x-3">
                            <img src="{{ $post->user->image_url ?? 'https://via.placeholder.com/150' }}"
                                 alt="{{ $post->user->name }}'s profile photo"
                                 class="w-12 h-12 rounded-full object-cover border border-gray-100">

                            <div>
                                <h3 class="font-bold text-sm text-gray-900 hover:text-blue-600 hover:underline cursor-pointer">
                                    {{ $post->user->name }}
                                </h3>
                                <p class="text-xs text-gray-500 leading-tight">
                                    {{ $post->user->headline }}
                                    @if($post->user->company)
                                        <span class="text-gray-400">@ {{ $post->user->company }}</span>
                                    @endif
                                </p>
                                <p class="text-[11px] text-gray-400 flex items-center mt-0.5">
                                    {{ $post->created_at }}
                                    <span class="mx-1">•</span> <i class="fa-solid fa-earth-americas"></i>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="text-sm text-gray-800 leading-relaxed whitespace-pre-line mb-4">
                        {{ $post->content }}
                    </div>

                    <div class="border-t border-gray-100 pt-2 flex justify-around text-gray-500 font-semibold text-sm">
                        <button class="flex items-center space-x-2 hover:bg-gray-100 py-2 px-3 rounded cursor-pointer transition w-full justify-center">
                            <i class="fa-regular fa-thumbs-up text-base"></i>
                            <span>Like</span>
                        </button>
                        <button class="flex items-center space-x-2 hover:bg-gray-100 py-2 px-3 rounded cursor-pointer transition w-full justify-center">
                            <i class="fa-regular fa-comment text-base"></i>
                            <span>Comment</span>
                        </button>
                    </div>

                </div>
            @empty
                <div class="bg-white rounded-lg border border-gray-200 p-8 text-center shadow-sm">
                    <i class="fa-regular fa-newspaper text-4xl text-gray-300 mb-3"></i>
                    <p class="text-gray-500 font-medium">No posts have been published on the network yet.</p>
                </div>
            @endforelse

        </div>

        <div class="hidden lg:block lg:col-span-1">
            <div class="bg-white rounded-lg border border-gray-200 p-4 shadow-sm">
                <h3 class="font-bold text-sm text-gray-900 mb-3">Add to your feed</h3>
                <p class="text-xs text-gray-500">Profile suggestions will show up here soon.</p>
            </div>
        </div>

    </div>
@endsection
