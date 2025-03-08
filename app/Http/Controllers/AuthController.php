<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function showregister()
    {
        return view('auth.register');
    }


    public function register(Request $request)
{
    $request->validate([
        'username' => 'required',
        'email'    => 'required|email|unique:users,email',
        'password' => 'required|min:6',
    ]);

    User::create([
        'username' => $request->username,
        'email'    => $request->email,
        'password' => bcrypt($request->password),
    ]);

    return redirect()->route('usedashboard');
}








public function showLoginForm()
{
    return view('auth.login'); // points to resources/views/auth/login.blade.php
}

/**
 * Handle the login request safely.
 */
public function login(Request $request)
{
    $credentials = $request->validate([
        'email'    => ['required', 'email'],
        'password' => ['required'],
    ]);
    if (Auth::attempt($credentials, $request->filled('remember'))) {
        $request->session()->regenerate();
        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        } 
        else if (Auth::user()->role == 'user') {

            return redirect()->route('user.dashboard');
        }
    }
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
}

/**
 * Log the user out.
 */
public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login');
}
    

}
