<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class LoginController extends Controller
{

    public function showProfile()
{
    $user = Auth::user();

    if (!$user) {
        return redirect('/')->withErrors(['error' => 'Debes iniciar sesión primero']);
    }

    return view('perfil', compact('user'));
}

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:100',
            'correo' => 'required|email|unique:users',
            'telefono' => 'required|string|max:10',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        User::create([
            'nombre' => $validated['nombre'],
            'correo' => $validated['correo'],
            'telefono' => $validated['telefono'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect('/')->with('success', 'Registro exitoso. Por favor, inicia sesión.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'password' => 'required|string|min:8',
        ], [
            'correo.required' => 'El campo correo es obligatorio.',
            'correo.email' => 'El formato del correo no es válido.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.'
        ]);

        // Autenticamos el usuario
        $credentials = $request->only('correo', 'password');

        if (Auth::attempt(['correo' => $credentials['correo'], 'password' => $credentials['password']])) {
            return redirect('/inicio');
        } else {
            return back()->withErrors([
                'correo' => 'Las credenciales no coinciden con nuestros registros.',
            ]);
        }
    }

    public function updateProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:100',
            'correo' => 'required|email|unique:users,correo,' . $user->id,
            'telefono' => 'required|string|max:10',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user->nombre = $request->input('nombre');
        $user->correo = $request->input('correo');
        $user->telefono = $request->input('telefono');

        // Si se envía una nueva contraseña, actualizarla
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        // Guarda los cambios
        try {
            $user->save();
            return redirect('/perfil')->with('success', 'Información actualizada correctamente');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error al guardar los cambios: ' . $e->getMessage()]);
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Has cerrado sesión correctamente.');
    }
}
