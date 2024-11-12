<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
        $credentials = $request->only('email', 'password');

        $remember = ($request->has('remember')?true : false);
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            // return view('welcome');
            return redirect()->intended(route('home'));
        } else {
            return redirect()->route('login')->with('error', 'Usuario o contraseña incorrectos');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
