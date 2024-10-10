<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Storage;
use App\Models\Mascota;

class MascotaController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'nombre' => 'required|string|max:30',
            'especie' => 'required|string|max:30',
            'raza' => 'required|string|max:30',
            'edad' => 'required|integer|min:0',
            'sexo' => 'required|string|max:10',
            'caracteristicas' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Comprobar si se subió una foto
        if ($request->hasFile('foto')) {
            // Guardar la imagen
            $path = $request->file('foto')->store('mascotas', 'public'); // Guardar en public/img/mascotas

            // Mostrar el path para depuración
            \Log::info('Imagen guardada en: ' . $path);
        } else {
            \Log::warning('No se recibió ninguna imagen.');
            $path = null; // Si no hay imagen, se establece como NULL
        }

        // Crear la mascota
        $mascota = Mascota::create([
            'nombre' => $request->nombre,
            'especie' => $request->especie,
            'raza' => $request->raza,
            'edad' => $request->edad,
            'sexo' => $request->sexo,
            'caracteristicas' => $request->caracteristicas,
            'foto' => $path,
            'user_id' => auth()->id(), // Asegúrate de que el usuario esté autenticado
        ]);

        return redirect('/CrudMascota')->with('success', 'Mascota registrada con éxito.');
    }

    public function index()
    {
        // Obtener el ID del usuario autenticado
        $userId = auth()->user()->id;

        // Obtener solo las mascotas del usuario autenticado
        $mascotas = Mascota::where('user_id', $userId)->get();

        // Retornar la vista con las mascotas del usuario
        return view('Mascota.CrudMascota', compact('mascotas'));
    }

    public function destroy($id)
    {
        $mascota = Mascota::find($id);

        // Verificar si el usuario actual es el dueño de la mascota
        if (Auth::id() !== $mascota->user_id) {
            abort(403, 'No tienes permiso para eliminar esta mascota');
        }

        // Eliminar la mascota
        $mascota->delete();

        // Redirigir con mensaje de éxito
        return redirect()->route('crud.mascota')->with('success', 'Mascota eliminada');
    }

    public function showCarnet($id)
    {
        $mascota = Mascota::findOrFail($id);
        return view('Mascota.Carnet', compact('mascota'));
    }

    public function buscar(Request $request)
    {
        // Obtener el término de búsqueda
        $busqueda = $request->input('busqueda');

        // Buscar mascotas en la base de datos que coincidan con el nombre o algún otro campo
        $mascotas = Mascota::where('nombre', 'like', '%' . $busqueda . '%')
                            ->orWhere('especie', 'like', '%' . $busqueda . '%')
                            ->orWhere('raza', 'like', '%' . $busqueda . '%')
                            ->get();

        // Retornar la vista con los resultados
        return view('Mascota.CrudMascota', compact('mascotas', 'busqueda'));
    }

    public function editar($id)
{
    // Obtener la mascota por su ID
    $mascota = Mascota::findOrFail($id);

    // Pasar los datos a la vista
    return view('Mascota.EditarDatos', compact('mascota'));
}

public function actualizar(Request $request, $id)
{
    $mascota = Mascota::findOrFail($id);

    // Validación de datos
    $request->validate([
        'nombre' => 'required|string|max:255',
        'edad' => 'required|integer',
        'especie' => 'required|string|max:255',
        'sexo' => 'required|string',
        'raza' => 'required|string|max:255',
        'caracteristicas' => 'nullable|string',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Actualizar información de la mascota
    $mascota->nombre = $request->nombre;
    $mascota->edad = $request->edad;
    $mascota->especie = $request->especie;
    $mascota->sexo = $request->sexo;
    $mascota->raza = $request->raza;
    $mascota->caracteristicas = $request->caracteristicas;

    // Subir la nueva foto si se ha proporcionado
    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('mascotas', $filename, 'public');
        $mascota->foto = $filename;
    }

    $mascota->save();

    return redirect()->route('carnet')->with('success', 'Datos de la mascota actualizados correctamente.');
}

}
