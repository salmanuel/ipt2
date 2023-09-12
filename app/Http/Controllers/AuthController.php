<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function loginForm () {
        return view ('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->email_verified_at) {
                return view('dashboard');
            } else {
                Auth::logout();
                return redirect()->route('loginForm')->with('error', 'Email not verified. Please check your email for verification instructions.');
            }
        }

        return redirect()->route('loginForm')->with('error', 'Invalid credentials');
    }

    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have logged out');
    }

    public function dashboard()
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            return view('dashboard');
        }

        // If the user is not authenticated, redirect to the login form
        return redirect()->route('loginForm');
    }

    public function registerForm () {
        return view ('auth.register');
    }

    public function register (Request $request) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|string|min:6',
        ]);

        $token = Str::random(24);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => $token,
        ]);

        Mail::send('auth.verification-mail', ['user' => $user], function($mail) use($user){
            $mail->to($user->email);
            $mail->subject('Account Verification');
        });

        return redirect('/')->with('message', 'Your account has been created, Please check your email for the verification link.');
    }

    public function verification (User $user, $token) {
        if($user->remember_token !== $token) {
            return redirect('/')->with('error', 'Invalid Token');
        }

        $user->email_verified_at = now();
        $user->save();

        return redirect('/')->with('message', 'Your account has been verified');
    }
}
