<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showSignup()
    {
        return view('signup');
    }

 public function signup(Request $request)
{
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password)
    ]);

    Auth::login($user);

   return redirect('/')
    ->with('success', 'Account created successfully!');
}

public function showLogin()
{
    return view('login');
}

public function login(Request $request)
{
    if (Auth::attempt([
        'email' => $request->email,
        'password' => $request->password
    ])) {

        $request->session()->regenerate();
       return redirect('/')
    ->with(
        'success',
        'Welcome back ' . Auth::user()->name . '!'
    );
        
    }

    return back()->with(
        'error',
        'Invalid Email or Password'
    );
}   

public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
}
    
}