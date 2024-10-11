<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VeterinarioController extends Controller
{
    public function index(Request $request)
    {
        $ubicacion = $request->input('ubicacion', '40.7128,-74.0060'); // Ubicación por defecto de Nueva York

        try {
            // Pasar la ubicación a la vista para renderizar el mapa
            return view('veterinarios', compact('ubicacion'));
        } catch (\Exception $e) {
            \Log::error('Error buscando veterinarios: ' . $e->getMessage());
            return view('veterinarios', ['error' => 'No se pudieron encontrar veterinarios']);
        }
    }
}
