<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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

    
}
