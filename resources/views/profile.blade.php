@extends('layouts.app')

@section('title', $user->name . ' - Profile')

@section('content')
    <div class="container mx-auto max-w-4xl py-8 px-4">
        <!-- Profile Card -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200">
            <!-- Cover Image -->
            <div class="h-32 bg-gradient-to-r from-blue-500 to-blue-700"></div>

            <!-- Profile Info -->
            <div class="px-6 pb-6 -mt-16">
                <div class="flex flex-col md:flex-row items-start md:items-end justify-between">
                    <div class="flex items-center gap-4">
                        <!-- Avatar -->
                        <img src="{{ $user->image_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&size=96&background=2563eb&color=fff' }}"
                             alt="{{ $user->name }}"
                             class="w-24 h-24 md:w-28 md:h-28 rounded-full border-4 border-white object-cover shadow-md">

                        <div>
                            <h1 class="text-2xl md:text-3xl font-bold text-gray-900">{{ $user->name }}</h1>
                            <p class="text-gray-600 text-sm md:text-base">{{ $user->headline ?? 'No headline set' }}</p>
                            @if($user->company)
                                <p class="text-gray-500 text-sm mt-1">
                                    <i class="fa-solid fa-building mr-1"></i> {{ $user->company }}
                                </p>
                            @endif
                            <p class="text-gray-400 text-xs mt-1">
                                <i class="fa-regular fa-calendar mr-1"></i>
                                Joined {{ $user->created_at->format('F Y') }}
                            </p>
                        </div>
                    </div>

                    <!-- Follow Button -->
                    @auth
                        @if(auth()->id() !== $user->id)
                            <form action="{{ route('follow', $user) }}" method="POST" class="mt-4 md:mt-0">
                                @csrf
                                @if($isFollowing)
                                    <button type="submit"
                                            class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-5 py-2 rounded-full text-sm font-semibold transition flex items-center gap-2">
                                        <i class="fa-regular fa-check-circle"></i>
                                        Following
                                    </button>
                                @else
                                    <button type="submit"
                                            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-full text-sm font-semibold transition flex items-center gap-2">
                                        <i class="fa-regular fa-plus"></i>
                                        Follow
                                    </button>
                                @endif
                            </form>
                        @endif
                    @endauth
                </div>

                <!-- Stats -->
                <div class="flex gap-6 mt-4 text-sm border-t border-gray-100 pt-4">
                <span>
                    <span class="font-bold text-gray-900">{{ $postsCount }}</span>
                    <span class="text-gray-500">Posts</span>
                </span>
                    <span>
                    <span class="font-bold text-gray-900">{{ $followersCount }}</span>
                    <span class="text-gray-500">Followers</span>
                </span>
                    <span>
                    <span class="font-bold text-gray-900">{{ $followingCount }}</span>
                    <span class="text-gray-500">Following</span>
                </span>
                </div>
            </div>
        </div>

        <!-- User's Posts -->
        <div class="mt-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">
                <i class="fa-regular fa-newspaper mr-2"></i>
                Posts by {{ $user->name }}
            </h2>

            @forelse($posts as $post)
                <div class="bg-white rounded-lg shadow-md p-4 mb-4 border border-gray-100">
                    <div class="flex items-center gap-3 mb-2">
                        <img src="{{ $post->user->image_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($post->user->name) . '&size=32&background=2563eb&color=fff' }}"
                             alt="{{ $post->user->name }}"
                             class="w-8 h-8 rounded-full object-cover">
                        <div>
                            <h4 class="font-bold text-sm">{{ $post->user->name }}</h4>
                            <p class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                        </div>
                    </div>

                    <p class="text-gray-800 text-sm leading-relaxed">{{ $post->content }}</p>

                    <div class="mt-3 flex gap-4 text-xs text-gray-500">
                    <span>
                        <i class="fa-regular fa-thumbs-up mr-1"></i>
                        {{ $post->likes()->count() }}
                    </span>
                        <span>
                        <i class="fa-regular fa-comment mr-1"></i>
                        {{ $post->comments()->count() }}
                    </span>
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-lg shadow-md p-8 text-center text-gray-500 border border-gray-100">
                    <i class="fa-regular fa-newspaper text-4xl block mb-3 text-gray-300"></i>
                    <p>{{ $user->name }} hasn't posted anything yet.</p>
                </div>
            @endforelse

            <!-- Pagination -->
            @if($posts->hasPages())
                <div class="mt-4">
                    {{ $posts->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
