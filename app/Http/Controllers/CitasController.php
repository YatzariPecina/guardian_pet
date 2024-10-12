<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Mascota;
use App\Models\Veterinario;
use App\Models\Citas;

class CitasController extends Controller
{
    public function show(){
        // obtener las mascotas del usuario 
        $mascotas = Mascota::where('user_id', Auth::id())->get();
        // por ahora obtiene todos los veterinarios 
        $veterinarios = Veterinario::all();
        return view('Mascota.RegistroCita', compact('mascotas', 'veterinarios'));
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'motivo' => 'required|string|max:255',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'mascota' => 'required|exists:mascotas,id',
            'veterinario' => 'required|exists:veterinarios,id',
        ]);

        $citas = Citas::create([
            'motivo' => $validatedData['motivo'],
            'fecha' => $validatedData['fecha'],
            'hora' => $validatedData['hora'],
            'estado' => 'Sin realizar',  // Indica que la cita no ha sido realizada aún 
            'mascota_id' => $validatedData['mascota'],
            'veterinario_id' => $validatedData['veterinario'],
        ]);

        return redirect('/CrudCitas')->with('success', 'Cita registrada con éxito.');
    }
}
