<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    public function store(){
        // validate the request data
        $validateAttribute = request()->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        // create a new user
        $user = User::create($validateAttribute);
        // log the user in
        auth()->login($user);
    
        // redirect to some wehre
        return redirect()->route('home')->with('success', 'Registration successful!');
        // or return a response
       
    }
}
