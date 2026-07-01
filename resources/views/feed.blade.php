@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

        <div class="hidden lg:block lg:col-span-1">
            <div class="bg-white rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                <div class="h-16 bg-blue-600"></div>
                <div class="px-4 pb-4 text-center -mt-8">
                    <img src="{{Auth::User()->image_url}}" alt="Avatar" class="w-16 h-16 rounded-full border-2 border-white mx-auto object-cover bg-white">
                    <h2 class="font-bold text-gray-800 mt-2">{{Auth::User()->name}}</h2>
                    <p class="text-xs text-gray-500 mt-1">Developer open to work</p>
                </div>
            </div>
        </div>

        <div class="col-span-1 lg:col-span-2 space-y-4" x-data="{ openModal: false }">

            <div class="bg-white rounded-lg border border-gray-200 p-4 shadow-sm">
                <div class="flex items-center space-x-3">
                    <img src="https://via.placeholder.com/150" alt="Avatar" class="w-12 h-12 rounded-full object-cover">
                    <button @click="openModal = true" class="flex-1 text-left bg-gray-100 hover:bg-gray-200 text-gray-500 font-semibold py-3 px-5 rounded-full border border-gray-200 text-sm transition cursor-pointer">
                        Start a post...
                    </button>
                </div>
            </div>

            <div x-show="openModal"
                 class="fixed inset-0 bg-black/60 z-50 flex items-center justify-center p-4"
                 x-transition
                 style="display: none;">

                <div class="bg-white w-full max-w-xl rounded-lg shadow-xl overflow-hidden border border-gray-200"
                     @click.away="openModal = false">

                    <div class="flex justify-between items-center px-6 py-4 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-800">Create a post</h2>
                        <button @click="openModal = false" class="text-gray-400 hover:text-gray-600 text-xl focus:outline-none cursor-pointer">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>

                    <form action="{{route('create.post')}}" method="POST" class="p-6 space-y-4">
                        @csrf
                        <input type="text" id="user_id" name="user_id" class="hidden" value="{{Auth::User()->id}}">
                        <div class="flex items-center space-x-3 mb-2">
                            <img src="https://via.placeholder.com/150" alt="Avatar" class="w-11 h-11 rounded-full object-cover">
                            <div>
                                <span class="font-bold text-sm text-gray-900 block">Logged In User</span>
                                <span class="text-xs text-gray-500 bg-gray-100 border border-gray-300 rounded-full px-2.5 py-0.5 font-semibold inline-flex items-center gap-1">
                            <i class="fa-solid fa-earth-americas text-[10px]"></i> Anyone <i class="fa-solid fa-caret-down text-[10px]"></i>
                        </span>
                            </div>
                        </div>

                        <div>
                    <textarea name="content"
                              rows="5"
                              placeholder="What do you want to talk about?"
                              required
                              class="w-full text-base text-gray-800 placeholder-gray-400 border-0 focus:ring-0 resize-none outline-none focus:outline-none"
                    >{{ old('content') }}</textarea>

                            @error('content')
                            <p class="text-red-600 text-xs font-semibold mt-1">
                                <i class="fa-solid fa-circle-exclamation mr-1"></i>{{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                            <div class="flex space-x-4 text-gray-500 text-lg">
                                <button type="button" class="hover:text-blue-600 cursor-pointer transition"><i class="fa-regular fa-image"></i></button>
                                <button type="button" class="hover:text-blue-600 cursor-pointer transition"><i class="fa-regular fa-calendar-days"></i></button>
                                <button type="button" class="hover:text-blue-600 cursor-pointer transition"><i class="fa-regular fa-lightbulb"></i></button>
                            </div>

                            <button type="submit"
                                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-1.5 rounded-full text-sm shadow-sm transition">
                                Post
                            </button>
                        </div>

                    </form>
                </div>
            </div>

            @forelse($posts as $post)
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
