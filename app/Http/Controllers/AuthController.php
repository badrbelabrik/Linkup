<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister(){
        return view('register');
    }

    public function showLogin(){
        return view('login');
    }

    public function register(Request $request){
        $validated = $request->validate([
           'name' => 'required|string|max:255',
           'email' => 'required|email|unique:users',
           'headline' => 'required|string|max:255',
           'company' => 'max:255',
           'image_url' => 'max:255',
           'password' => 'required|string|min:8|confirmed'
        ]);

        $user = User::create($validated);

        Auth::login($user);

        return redirect()->route('show.login');
    }

    public function login(){

    }
}
