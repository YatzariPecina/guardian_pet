<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascota;

class MascotaController extends Controller
{
    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'nombre' => 'required|string|max:30',
            'especie' => 'required|string|max:30',
            'raza' => 'nullable|string|max:30',
            'edad' => 'required|integer|min:0',
            'sexo' => 'required|string|max:10',
            'caracteristicas' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación de la imagen
        ]);

        // Subir la foto si está presente
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('fotos_mascotas', 'public');
        } else {
            $fotoPath = null;
        }

        // Crear la mascota en la base de datos
        Mascota::create([
            'nombre' => $request->nombre,
            'especie' => $request->especie,
            'raza' => $request->raza,
            'edad' => $request->edad,
            'sexo' => $request->sexo,
            'caracteristicas' => $request->caracteristicas,
            'user_id' => auth()->id(), // Obtener el ID del usuario autenticado
            'foto' => $fotoPath, // Guardar la ruta de la foto
        ]);

        // Redirigir con un mensaje de éxito
        return redirect('/CrudMascota')->with('success', 'Mascota registrada correctamente.');
    }
}