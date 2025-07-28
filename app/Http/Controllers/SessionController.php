<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Support\Facades\RateLimiter;
class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }
    public function store(Request $request)
    {
        // check if user has many requests in a short time
        $maxAttempts = 2; // maximum attempts
        $decayMinutes = 1; // time in minutes to wait before allowing more attempts
        $key = $this->throttleKey($request);
        if(RateLimiter::tooManyAttempts($key, 2)){
            // if so, throw a ThrottleRequestsException
            throw new ThrottleRequestsException('Too many login attempts. Please try again later.');

        }
        RateLimiter::hit($key, $decayMinutes * 60); // record the attempt

         // check if the user is already logged in
         if(Auth::check()){
            return redirect()->route('jobs.index')->with('message', 'You are already logged in!');
         }
         // if not, proceed with login
         // check if the request has valid credentials
       // validate the request
         $attributes =  $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
         ]);
         // attempt to log the user in
         if(!Auth::attempt($attributes)){
            // if unsuccessful, redirect back with an error message
            // cach 1
            // return back()->withErrors([
            //     'email' => 'The provided credentials do not match our records.',
            // ])->onlyInput('email');  
            // cach 2
            throw ValidationException::withMessages([
                'email' => 'The provided credentials do not match our records.'
            ]);
        }
        // generate a session token
        $request->session()->regenerate();
        // if successful, redirect to the intended page or home with a success message
        return redirect()->route('jobs.index')->with('message', 'You are now logged in!');
    }

    protected function throttleKey(Request $request)
    {
        return strtolower($request->input('email')). '|' . $request->ip();
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/')->with('message', 'You have been logged out successfully.');
    }
    // Add other methods for handling login, logout, etc. as needed
}
