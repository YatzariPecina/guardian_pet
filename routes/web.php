<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;

Route::post('/validar-registro', [LoginController::class, 'register'])->name('validar-registro');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/perfil', [LoginController::class, 'showProfile'])->name('perfil');
Route::put('/perfil/{id}', [LoginController::class, 'updateProfile'])->name('perfil.update');

Route::get('/', function () {
    return view('login');
});

Route::get('/registro', function () {
    return view('registro');
});

Route::get('/inicio', function () {
    return view('inicio');
});

Route::get('/Carnet', function () {
    return view('Mascota.Carnet');
});

Route::get('/CrudCitas', function () {
    return view('Mascota.CrudCitas');
});

Route::get('/CrudMascota', function () {
    return view('Mascota.CrudMascota');
});

Route::get('/EditarDatos', function () {
    return view('Mascota.EditarDatos');
});

Route::get('/RegistroCita', function () {
    return view('Mascota.RegistroCita');
});

Route::get('/RegistroMascota', function () {
    return view('Mascota.RegistroMascota');
});

Route::get('/CrudVeterinarios', function () {
    return view('Veterinario.CrudVeterinarios');
});

Route::get('/DetallesVeterinario', function () {
    return view('Veterinario.DetallesVeterinario');
});

Route::get('/MisVeterinarios', function () {
    return view('Veterinario.MisVeterinarios');
});

Route::get('/logout', function () {
    Auth::logout(); 
    return redirect('/'); 
})->name('logout');