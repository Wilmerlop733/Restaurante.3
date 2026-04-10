<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Muestra la lista de usuarios.
     */
    public function index()
    {
        $usuarios = User::with('roles')->get();
        return view('Usuarios.index', compact('usuarios'));
    }

    /**
     * Muestra el formulario para crear un nuevo usuario.
     */
    public function create()
    {
        $roles = Role::all();
        return view('Usuarios.create', compact('roles'));
    }

    /**
     * Guarda un nuevo usuario y le asigna un rol.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'rol' => 'required|exists:roles,name'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_active' => $request->has('is_active') ? true : false,
        ]);

        $user->assignRole($request->rol);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente.');
    }

    /**
     * Muestra el formulario para editar un usuario.
     */
    public function edit(User $usuario)
    {
        $roles = Role::all();
        return view('Usuarios.edit', compact('usuario', 'roles'));
    }

    /**
     * Actualiza los datos del usuario y su rol.
     */
    public function update(Request $request, User $usuario)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:users,name,' . $usuario->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $usuario->id,
            'password' => 'nullable|string|min:8|confirmed',
            'rol' => 'required|exists:roles,name'
        ]);

        $usuario->update([
            'name' => $request->name,
            'email' => $request->email,
            'is_active' => $request->has('is_active') ? true : false,
        ]);

        if ($request->filled('password')) {
            $usuario->update(['password' => Hash::make($request->password)]);
        }

        $usuario->syncRoles([$request->rol]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }

    /**
     * Elimina a un usuario.
     */
    public function destroy(User $usuario)
    {
        if (auth()->id() === $usuario->id) {
            return redirect()->route('usuarios.index')->with('error', 'No puedes eliminarte a ti mismo.');
        }

        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
