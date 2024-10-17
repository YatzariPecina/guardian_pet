<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\VeterinarioController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\DataController;

Route::get('/', function () {
    // Si el usuario ya está autenticado, redirige a /inicio
    if (Auth::check()) {
        return redirect('/inicio');
    }
    return view('login');
})->name('login');

// Ruta para procesar el login con el método POST
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/validar-registro', [LoginController::class, 'register'])->name('validar-registro');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/registro', function () {
    return view('registro');
});

// Rutas protegidas con el middleware 'auth'
Route::middleware(['auth'])->group(function () {
    Route::get('/inicio', function () {
        return view('inicio');
    })->name('inicio');

    // Rutas del perfil
    Route::get('/perfil', [LoginController::class, 'showProfile'])->name('perfil');
    Route::put('/perfil/{id}', [LoginController::class, 'updateProfile'])->name('perfil.update');

    // Rutas para Mascotas
    Route::get('/CrudMascota', [MascotaController::class, 'index'])->name('crud.mascota');
    Route::post('/mascotas', [MascotaController::class, 'store'])->name('mascotas.store');
    Route::get('/buscarMascota', [MascotaController::class, 'buscar'])->name('buscarMascota');
    Route::get('/mascotas', [MascotaController::class, 'index'])->name('mascotas.index');
    Route::delete('/mascotas/{mascota}', [MascotaController::class, 'destroy'])->name('mascotas.destroy');
    Route::get('/mascota/{id}/carnet', [MascotaController::class, 'showCarnet'])->name('mascota.carnet');
    Route::get('/EditarDatos/{id}', [MascotaController::class, 'editar'])->name('mascota.editar');
    Route::post('/ActualizarDatos/{id}', [MascotaController::class, 'actualizar'])->name('mascota.actualizar');

    // Rutas para Citas
    Route::get('/RegistroCita', [CitasController::class, 'show'])->name('cita.registrar');
    Route::post('/RegistroCita', [CitasController::class, 'store'])->name('citas.store');
    Route::get('/CrudCitas', [CitasController::class, 'index'])->name('citas.index');
    Route::get('/EditarCita/{id}', [CitasController::class, 'modify'])->name('citas.editar');
    Route::put('/ActualizarCita/{id}', [CitasController::class, 'update'])->name('citas.actualizar');
    Route::delete('/EliminarCita/{id}', [CitasController::class, 'delete'])->name('citas.delete');

    // Rutas para Veterinarios
    Route::resource('veterinario', VeterinarioController::class);

    Route::get('/Carnet', function () {
        return view('Mascota.Carnet');
    });

    Route::get('/EditarDatos', function () {
        return view('Mascota.EditarDatos');
    });

    Route::get('/RegistroMascota', function () {
        return view('Mascota.RegistroMascota');
    });
});

Route::match(['get', 'post'], '/receive-data', [DataController::class, 'receiveData'])->name('dataset');
Route::post('/actualizar-dataset', [DataController::class, 'actualizarData'])->name('actualizar.dataset');
Route::post('/send-data', [DataController::class, 'predecir'])->name('predecir');
Route::get('/mostrar-salida', [DataController::class, 'mostrarSalida'])->name('mostrarSalida');

Route::get('/download-file', function () {
    $file = storage_path('datasets/dataset.csv');
    return response()->download($file);
});

// Ruta para cerrar sesión (ya protegida también)
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/')->with('success', 'Has cerrado sesión correctamente.');
})->name('logout');

Route::get('/csrf-token', function () {
    return response()->json(['csrf_token' => csrf_token()]);
});
