<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('Inicio.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ], [
            'name.required' => 'El nombre de usuario es obligatorio.',
            'password.required' => 'La contraseña es obligatoria.',
        ]);

        $nombreUsuario = $request->name;
        $contrasena = $request->password;
        
        $recordarSesion = false;
        if ($request->has('remember')) {
            $recordarSesion = true;
        }

        $credenciales = [
            'name' => $nombreUsuario,
            'password' => $contrasena
        ];


        $loginCorrecto = Auth::attempt($credenciales, $recordarSesion);

        if ($loginCorrecto == true) {
            return redirect('/');
        } else {
            
            return redirect('/login')->withErrors([
                'name' => 'El nombre de usuario o la contraseña son incorrectos.',
            ])->withInput();
        }
    }

    public function showRegistrationForm()
    {
        return view('Inicio.registro');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => 'El nombre de usuario es obligatorio.',
            'name.unique' => 'Este nombre de usuario ya está en uso.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El formato del correo electrónico no es válido.',
            'email.unique' => 'Este correo electrónico ya está en uso.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ]);

        $nuevoUsuario = new User();
        $nuevoUsuario->name = $request->name;
        $nuevoUsuario->email = $request->email;
        
        $contrasenaOculta = Hash::make($request->password);
        $nuevoUsuario->password = $contrasenaOculta;
        
        $nuevoUsuario->save();

        Auth::login($nuevoUsuario);

        return redirect('/');
    }

    public function logout(Request $request)
    {

        Auth::logout();
        
        return redirect('/');
    }

    public function showForgotPasswordForm()
    {
        return view('Inicio.recuperar');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => 'El nombre de usuario es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'password.required' => 'La nueva contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ]);

        $usuarioEncontrado = User::where('name', '=', $request->name)
                                 ->where('email', '=', $request->email)
                                 ->first();

        if ($usuarioEncontrado == null) {
            return redirect('/recuperar')->withErrors([
                'name' => 'No encontramos ninguna cuenta con ese usuario y correo.',
            ])->withInput();
        }

        $nuevaContrasenaOculta = Hash::make($request->password);
        $usuarioEncontrado->password = $nuevaContrasenaOculta;
        $usuarioEncontrado->save();

        return redirect('/login')->with('status', 'Tu contraseña ha sido restablecida. Inicia sesión.');
    }
}
