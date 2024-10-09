<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
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

}
