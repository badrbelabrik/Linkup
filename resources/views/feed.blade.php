@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

        <div class="hidden lg:block lg:col-span-1">
            <div class="bg-white rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                <div class="h-16 bg-blue-600"></div>
                <div class="px-4 pb-4 text-center -mt-8">
                    <img src="{{ auth()->user()->image_url ?? 'https://via.placeholder.com/150' }}" alt="Avatar" class="w-16 h-16 rounded-full border-2 border-white mx-auto object-cover bg-white">
                    <h2 class="font-bold text-gray-800 mt-2">{{ auth()->user()->name }}</h2>
                    <p class="text-xs text-gray-500 mt-1">{{ auth()->user()->headline ?? 'Developer' }}</p>
                </div>
            </div>
        </div>

        <div class="col-span-1 lg:col-span-2 space-y-4" x-data="{
            openModal: false,
            editModal: false,
            editPostId: null,
            editContent: ''
        }">

            <div class="bg-white rounded-lg border border-gray-200 p-4 shadow-sm">
                <div class="flex items-center space-x-3">
                    <img src="{{ auth()->user()->image_url ?? 'https://via.placeholder.com/150' }}" alt="Avatar" class="w-12 h-12 rounded-full object-cover">
                    <button @click="openModal = true" class="flex-1 text-left bg-gray-100 hover:bg-gray-200 text-gray-500 font-semibold py-3 px-5 rounded-full border border-gray-200 text-sm transition cursor-pointer">
                        Start a post...
                    </button>
                </div>
            </div>

            <!-- CREATE POST MODAL -->
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
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                        <div class="flex items-center space-x-3 mb-2">
                            <img src="{{ auth()->user()->image_url ?? 'https://via.placeholder.com/150' }}" alt="Avatar" class="w-11 h-11 rounded-full object-cover">
                            <div>
                                <span class="font-bold text-sm text-gray-900 block">{{ auth()->user()->name }}</span>
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

            <!-- EDIT POST MODAL -->
            <div x-show="editModal"
                 class="fixed inset-0 bg-black/60 z-50 flex items-center justify-center p-4"
                 x-transition
                 style="display: none;">

                <div class="bg-white w-full max-w-xl rounded-lg shadow-xl overflow-hidden border border-gray-200"
                     @click.away="editModal = false">

                    <div class="flex justify-between items-center px-6 py-4 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-800">Edit Post</h2>
                        <button @click="editModal = false" class="text-gray-400 hover:text-gray-600 text-xl focus:outline-none cursor-pointer">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>

                    <form :action="'/posts/' + editPostId" method="POST" class="p-6 space-y-4">
                        @csrf
                        @method('PUT')

                        <div class="flex items-center space-x-3 mb-2">
                            <img src="{{ auth()->user()->image_url ?? 'https://via.placeholder.com/150' }}" alt="Avatar" class="w-11 h-11 rounded-full object-cover">
                            <div>
                                <span class="font-bold text-sm text-gray-900 block">{{ auth()->user()->name }}</span>
                                <span class="text-xs text-gray-500 bg-gray-100 border border-gray-300 rounded-full px-2.5 py-0.5 font-semibold inline-flex items-center gap-1">
                                    <i class="fa-solid fa-earth-americas text-[10px]"></i> Anyone <i class="fa-solid fa-caret-down text-[10px]"></i>
                                </span>
                            </div>
                        </div>

                        <div>
                            <textarea x-model="editContent"
                                      name="content"
                                      rows="5"
                                      placeholder="What do you want to talk about?"
                                      required
                                      class="w-full text-base text-gray-800 placeholder-gray-400 border-0 focus:ring-0 resize-none outline-none focus:outline-none"
                            ></textarea>

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
                                Update Post
                            </button>
                        </div>

                    </form>
                </div>
            </div>

            <!-- POSTS LIST -->
            @forelse($posts as $post)
                <div class="bg-white rounded-lg border border-gray-200 p-4 shadow-sm space-y-3"
                     x-data="{
                        openMenu: false,
                        openDeleteModal: false
                     }">

                    <div class="flex items-center justify-between gap-3">
                        <div class="flex items-center gap-3 flex-1">
                            <img src="{{ $post->user->image_url ?? asset('images/default-avatar.png') }}"
                                 class="w-12 h-12 rounded-full object-cover"
                                 alt="Avatar">

                            <div>
                                <!-- ✅ REMOVED profile link - just plain text -->
                                <h3 class="font-bold text-gray-900">{{ $post->user->name }}</h3>
                                <p class="text-xs text-gray-500 leading-tight">{{ $post->user->headline }}</p>
                                <p class="text-[11px] text-gray-400 mt-0.5">
                                    {{ $post->created_at->diffForHumans() }} <span class="mx-0.5">•</span> <i class="fa-solid fa-earth-americas text-[10px]"></i>
                                </p>
                            </div>
                        </div>

                        @if(auth()->check() && auth()->id() === $post->user_id)
                            <div class="relative">
                                <button @click="openMenu = !openMenu" class="text-gray-500 hover:text-gray-800 p-2 rounded-full hover:bg-gray-100 transition focus:outline-none cursor-pointer">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </button>

                                <div x-show="openMenu"
                                     @click.away="openMenu = false"
                                     x-transition
                                     class="absolute right-0 mt-1 w-40 bg-white border border-gray-200 rounded-md shadow-lg py-1 z-40 text-sm font-normal text-gray-700"
                                     style="display: none;">

                                    <button type="button"
                                            @click="
                                                openMenu = false;
                                                editPostId = {{ $post->id }};
                                                editContent = '{{ addslashes($post->content) }}';
                                                editModal = true;
                                            "
                                            class="w-full flex items-center text-left px-4 py-2 hover:bg-gray-100 transition text-gray-700 cursor-pointer">
                                        <i class="fa-regular fa-pen-to-square mr-2.5 text-gray-400"></i> Edit post
                                    </button>

                                    <div class="border-t border-gray-100 my-1"></div>

                                    <button type="button"
                                            @click="openDeleteModal = true; openMenu = false"
                                            class="w-full flex items-center text-left px-4 py-2 text-red-600 hover:bg-red-50 transition cursor-pointer font-medium">
                                        <i class="fa-regular fa-trash-can mr-2.5 text-red-400"></i> Delete post
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>

                    <p class="text-sm text-gray-800 leading-relaxed whitespace-pre-line">{{ $post->content }}</p>

                    <!-- POST STATS: Likes & Comments Count -->
                    <div class="flex items-center gap-4 text-sm text-gray-500">
                        <span class="flex items-center gap-1">
                            <i class="fa-regular fa-thumbs-up"></i>
                            {{ $post->likes()->count() }} likes
                        </span>
                        <span class="flex items-center gap-1">
                            <i class="fa-regular fa-comment"></i>
                            {{ $post->comments()->count() }} comments
                        </span>
                    </div>

                    <!-- COMMENT FORM -->
                    <div class="mt-3 pt-3 border-t border-gray-100">
                        <form action="{{ route('comments.store', $post) }}" method="POST" class="flex gap-2">
                            @csrf
                            <div class="flex-1 relative">
                                <input type="text"
                                       name="content"
                                       placeholder="Write a comment..."
                                       class="w-full border border-gray-300 rounded-full px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                       maxlength="500"
                                       required>
                                <span class="absolute right-3 top-1/2 -translate-y-1/2 text-xs text-gray-400">
                                    0/500
                                </span>
                            </div>
                            <button type="submit"
                                    class="bg-blue-600 text-white px-4 py-2 rounded-full text-sm hover:bg-blue-700 transition flex items-center gap-1">
                                <i class="fa-regular fa-paper-plane"></i>
                                <span class="hidden sm:inline">Comment</span>
                            </button>
                        </form>

                        @error('content')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror

                        <!-- EXISTING COMMENTS -->
                        <div class="mt-3 space-y-3">
                            @foreach($post->comments as $comment)
                                <div class="flex items-start gap-2">
                                    <!-- ✅ REMOVED profile link from avatar -->
                                    <img src="{{ $comment->user->image_url ?? 'https://via.placeholder.com/150' }}"
                                         alt="{{ $comment->user->name }}"
                                         class="w-8 h-8 rounded-full object-cover">
                                    <div class="flex-1 bg-gray-100 rounded-lg px-3 py-2">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <!-- ✅ REMOVED profile link - just plain text -->
                                                <span class="font-semibold text-sm">{{ $comment->user->name }}</span>
                                                <span class="text-xs text-gray-500 ml-2">{{ $comment->created_at->diffForHumans() }}</span>
                                            </div>
                                            <!-- Delete comment (only for owner) -->
                                            @if(auth()->check() && auth()->id() === $comment->user_id)
                                                <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="text-red-500 hover:text-red-700 text-xs"
                                                            onclick="return confirm('Delete this comment?')">
                                                        <i class="fa-regular fa-trash-can"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                        <p class="text-sm text-gray-800">{{ $comment->content }}</p>
                                    </div>
                                </div>
                            @endforeach

                            @if($post->comments->isEmpty())
                                <p class="text-xs text-gray-400 text-center py-2">No comments yet. Be the first!</p>
                            @endif
                        </div>
                    </div>

                    <!-- LIKE BUTTON -->
                    <div class="border-t border-gray-100 pt-2 flex justify-around text-gray-500 font-semibold text-sm">
                        <form action="{{ route('likes.toggle', $post) }}" method="POST" class="w-full">
                            @csrf
                            <button type="submit"
                                    class="flex items-center justify-center space-x-2 hover:bg-gray-100 py-2 px-3 rounded cursor-pointer transition w-full
                                    {{ $post->isLikedByUser() ? 'text-blue-600' : 'text-gray-500' }}">
                                <i class="{{ $post->isLikedByUser() ? 'fa-solid' : 'fa-regular' }} fa-thumbs-up text-base"></i>
                                <span>{{ $post->isLikedByUser() ? 'Unlike' : 'Like' }}</span>
                            </button>
                        </form>
                        <button class="flex items-center justify-center space-x-2 hover:bg-gray-100 py-2 px-3 rounded cursor-pointer transition w-full">
                            <i class="fa-regular fa-comment text-base"></i>
                            <span>Comment</span>
                        </button>
                    </div>

                    <!-- DELETE CONFIRMATION MODAL -->
                    <div x-show="openDeleteModal"
                         class="fixed inset-0 bg-black/60 z-50 flex items-center justify-center p-4"
                         x-transition
                         style="display: none;">

                        <div class="bg-white w-full max-w-md rounded-lg shadow-xl border border-gray-200 overflow-hidden"
                             @click.away="openDeleteModal = false">

                            <div class="flex justify-between items-center px-6 py-4 border-b border-gray-100">
                                <h3 class="text-lg font-bold text-gray-900">Delete post?</h3>
                                <button @click="openDeleteModal = false" class="text-gray-400 hover:text-gray-600 text-base focus:outline-none cursor-pointer">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div>

                            <div class="p-6">
                                <p class="text-sm text-gray-600 leading-relaxed">
                                    Are you sure you want to permanently delete this post from your feed? This action cannot be undone.
                                </p>
                            </div>

                            <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-end space-x-3 text-sm font-semibold">
                                <button type="button"
                                        @click="openDeleteModal = false"
                                        class="px-4 py-2 border border-gray-300 rounded-full text-gray-700 bg-white hover:bg-gray-100 transition cursor-pointer">
                                    Cancel
                                </button>

                                <form action="{{route('delete.post',$post->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-full shadow-sm transition cursor-pointer">
                                        Delete
                                    </button>
                                </form>
                            </div>

                        </div>
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

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Character counter for all comment inputs
            document.querySelectorAll('input[name="content"]').forEach(input => {
                const counter = input.parentElement.querySelector('.text-gray-400');

                if (counter) {
                    input.addEventListener('input', function() {
                        const count = this.value.length;
                        counter.textContent = count + '/500';

                        if (count > 480) {
                            counter.classList.add('text-red-500');
                            counter.classList.remove('text-gray-400');
                        } else if (count > 450) {
                            counter.classList.add('text-orange-500');
                            counter.classList.remove('text-gray-400');
                        } else {
                            counter.classList.remove('text-red-500');
                            counter.classList.remove('text-orange-500');
                            counter.classList.add('text-gray-400');
                        }
                    });
                }
            });
        });
    </script>
@endpush
