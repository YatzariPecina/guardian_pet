<?php

namespace App\Http\Controllers;

use App\Models\Veterinario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class VeterinarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $veterinarios = Veterinario::all();
        return view('Veterinario.MisVeterinarios', [
            'veterinarios' => $veterinarios,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Veterinario.createVeterinario');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validar = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'ubicacion' => 'required',
            'horario' => 'required',
            'telefono' => 'required',
            'foto' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $veterinarioImage = time() . '.' . $request->foto->getClientOriginalExtension();
        $request->foto->storeAs('', $veterinarioImage);

        // Crear el enlace simbólico
        Artisan::call('storage:link --force');

        Veterinario::create([
            'nombre' => $validar['nombre'],
            'descripcion' => $validar['descripcion'],
            'ubicacion' => $validar['ubicacion'],
            'horario' => $validar['horario'],
            'telefono' => $validar['telefono'],
            'foto' => $veterinarioImage,
        ]);

        return redirect()->route('veterinario.index')->with('success', 'Registro creado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Veterinario $veterinario)
    {
        return view('Veterinario.DetallesVeterinario', compact('veterinario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Veterinario $veterinario)
    {
        $veterinario->delete();

        return redirect()->route('veterinario.index')->with('success', 'Veterinario eliminado con éxito.');
    }
}
