<?php

namespace App\Http\Controllers;

use App\Jobs\CustomerJob;
use App\Models\Fruit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function loginForm () {
        if (Auth::check()) {
            return redirect()->back();
        }
        return view ('auth.login');
    }

    public function dashboard()
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            return view('dashboard');
        }

        // If the user is not authenticated, redirect to the login form
        return redirect()->route('login')->with('message', 'Please login first');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || $user->email_verified_at == null) {
            return redirect('/')->with('error', 'Your account is not verified yet or you are just an idjot pos');
        }

        $login = auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        if (!$login) {
            return back()->with('error', 'Naurrarauraur');
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->email_verified_at) {
                $fruits = Fruit::all();

                return view('dashboard', ['fruits' => $fruits]);
            } else {
                Auth::logout();
                return redirect()->route('login')->with('error', 'Email not verified. Please check your email for verification instructions.');
            }
        }

        return redirect()->route('login')->with('error', 'Invalid credentials');
    }

    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have successfully logged out');
    }



    public function registerForm () {
        if (Auth::check()) {
            return redirect()->back();
        }

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

        // dispatch(new CustomerJob($user->id));
        // dispatch(new CustomerJob($user));
        CustomerJob::dispatch($user);

        // Mail::send('auth.verification-mail', ['user' => $user], function($mail) use($user){
        //     $mail->to($user->email);
        //     $mail->subject('Account Verification');
        // });
        $viewerRole = Role::where('name', 'viewer')->first(); // Replace 'viewer' with the actual role name
        if ($viewerRole) {
            $user->assignRole($viewerRole);
        }
        

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
