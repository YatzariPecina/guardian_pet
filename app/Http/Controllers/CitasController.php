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

    public function index() {
        $user = auth()->user();
        // Obtener las mascotas del usuario y las citas de ellas 
        $citas = $user->mascotas()->with('citas.mascota')->get()->pluck('citas')->flatten();
        return view('Mascota.CrudCitas', compact('citas'));
    }
    
    public function modify($id) {
        $citas = Citas::findOrFail($id);
    
        // Obtener todas las mascotas y veterinarios para los selects
        $mascotas = Mascota::where('user_id', Auth::id())->get();
        $veterinarios = Veterinario::all();
    
        return view('Mascota.EditarCita', compact('citas', 'mascotas', 'veterinarios'));
    }
    
    public function update(Request $request, $id) {
        $citas = Citas::findOrFail($id);
    
        $validatedData = $request->validate([
            'motivo' => 'required|string|max:255',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'estado' => 'required|string',
            'mascota' => 'required|exists:mascotas,id',
            'veterinario' => 'required|exists:veterinarios,id',
        ]);
        $horaCompleta = $request->hora . ':00';
    
        // Actualización de los campos
        $citas->motivo = $request->motivo;
        $citas->fecha = $request->fecha;
        $citas->hora = $horaCompleta;
        $citas->estado = $request->estado;
        $citas->mascota_id = $request->mascota;
        $citas->veterinario_id = $request->veterinario;
        
        $citas->save();
    
        return redirect('/CrudCitas')->with('success', 'Cita modificada.');
    }
    

    public function delete($id) {
        $citas = Citas::findOrFail($id);

        $citas->delete();

        return redirect()->route('citas.index')->with('success', 'Cita eliminada');
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
