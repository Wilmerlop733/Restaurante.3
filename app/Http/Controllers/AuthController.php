<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        $roles = Role::all();
        return view('Inicio.login', compact('roles'));
    }


    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ], [
            'login.required' => 'El usuario o correo es obligatorio.',
            'password.required' => 'La contraseña es obligatoria.',
        ]);

        $loginValue = $request->login;
        $loginType = filter_var($loginValue, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        $recordarSesion = $request->has('remember');

        $credenciales = [
            $loginType => $loginValue,
            'password' => $request->password
        ];

        if (Auth::attempt($credenciales, $recordarSesion)) {
            if (!Auth::user()->is_active) {
                Auth::logout();
                return redirect('/login')->withErrors([
                    'login' => 'Tu cuenta ha sido deshabilitada. Contacta al administrador.',
                ])->withInput();
            }
            return redirect('/');
        }
        
        return redirect('/login')->withErrors([
            'login' => 'El nombre de usuario/correo o la contraseña son incorrectos.',
        ])->withInput();
    }


    public function showRegistrationForm()
    {
        $roles = Role::all();
        return view('Inicio.registro', compact('roles'));
    }


    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'rol' => 'required|exists:roles,name',
        ], [
            'name.required' => 'El nombre de usuario es obligatorio.',
            'name.unique' => 'Este nombre de usuario ya está en uso.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El formato del correo electrónico no es válido.',
            'email.unique' => 'Este correo electrónico ya está en uso.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'rol.required' => 'El rol es obligatorio.',
            'rol.exists' => 'El rol seleccionado no es válido.',
        ]);



        $nuevoUsuario = new User();
        $nuevoUsuario->name = $request->name;
        $nuevoUsuario->email = $request->email;
        
        $contrasenaOculta = Hash::make($request->password);
        $nuevoUsuario->password = $contrasenaOculta;
        
        $nuevoUsuario->save();

        if ($request->has('rol')) {
            $nuevoUsuario->assignRole($request->rol);
        }

        Auth::login($nuevoUsuario);


        return redirect('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login')->with('force_clear', true);
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
