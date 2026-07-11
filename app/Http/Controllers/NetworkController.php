<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class NetworkController extends Controller
{
    public function follow(User $user)
    {
        if (Auth::id() === $user->id) {
            return redirect()->back()->with('error', 'You cannot follow yourself.');
        }

        Auth::user()->following()->attach($user->id);

        return redirect()->back()->with('success', "You are now following {$user->name}.");
    }

    public function unfollow(User $user)
    {
        Auth::user()->following()->detach($user->id);

        return redirect()->back()->with('success', "You unfollowed {$user->name}.");
    }
}
