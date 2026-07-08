<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's public profile
     */
    public function show(User $user)
    {
        // Get user's posts with eager loading for performance
        $posts = Post::where('user_id', $user->id)
            ->with(['user', 'likes', 'comments'])
            ->latest()
            ->paginate(10);

        // Check if current user is following this user
        $isFollowing = false;
        if (Auth::check() && Auth::id() !== $user->id) {
            $isFollowing = Auth::user()->isFollowing($user);
        }

        // Get counts for stats
        $postsCount = $user->posts()->count();
        $followersCount = $user->followers()->count();
        $followingCount = $user->following()->count();

        // Return the view with all data
        return view('profile', compact(
            'user',
            'posts',
            'isFollowing',
            'postsCount',
            'followersCount',
            'followingCount'
        ));
    }

    /**
     * Show the profile edit form
     */
    public function edit()
    {
        $user = Auth::user();
        return view('profileEdit', compact('user'));
    }

    /**
     * Update the user's profile
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate the request
        $validated = $request->validate([
            'headline' => ['required', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'image_url' => ['nullable', 'url', 'max:255'],
        ]);

        // Update the user
        $user->update($validated);

        return redirect()->route('profile.show', $user)
            ->with('success', 'Profile updated successfully!');
    }

    /**
     * Upload a profile image (alternative to URL)
     */
    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $user = Auth::user();

        // Delete old image if it's not a URL
        if ($user->image_url && !filter_var($user->image_url, FILTER_VALIDATE_URL)) {
            Storage::disk('public')->delete($user->image_url);
        }

        // Store new image
        $path = $request->file('image')->store('profile-images', 'public');
        $user->image_url = $path;
        $user->save();

        return redirect()->route('profile.edit')
            ->with('success', 'Profile image updated successfully!');
    }
}
