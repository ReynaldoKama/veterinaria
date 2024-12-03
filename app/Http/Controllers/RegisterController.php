<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('login.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        // Verificar si el usuario ya existe 
        $existingUser = User::where('email', $request->input('email'))->first(); 
        if ($existingUser) { 
            Session::flash('error', 'El correo electrónico ya está registrado.'); 
            return redirect()->route('registrar-usuario');
        }

        try {
            $user = User::create([ 
                'name' => $request->input('name'),
                'email' => $request->input('email'), 
                'password' => Hash::make($request->input('password')),
                // 'phone'=> $request->input('num_tel')
            ])->assignRole('cliente');
            Session::flash('success', 'Usuario registrado correctamente');
        } catch (\Exception $e) {
            Session::flash('error', 'Error al registrar el usuario ' . $e->getMessage());
        }

        return redirect()->route('registrar-usuario');
        // Crear el usuario con la contraseña hasheada 
    }

    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $googleUser = Socialite::driver('google')->user();
        $email = $googleUser->getEmail();

        // Verificar si el correo ya está registrado con otro usuario 
        $existingUser = User::where('email', $email)->whereNull('google_id')->first(); 
        if ($existingUser) { 
            // Si el correo ya está registrado, redirigir con un mensaje de error 
            Session::flash('error', 'El correo electrónico ya está registrado.'); 
            return redirect()->route('registrar-usuario'); 
        }

        $user = User::updateOrCreate([
            'google_id' => $googleUser->id,
        ],
            ['email' => $googleUser->getEmail(),
            'name' => $googleUser->getName(), 
            'google_id' => $googleUser->getId()]
        )->assignRole('admin');

        Auth::login($user, true);
        
        return redirect()->route('home');
    }
    
}
