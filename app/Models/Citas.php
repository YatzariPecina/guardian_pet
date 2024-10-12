<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    use HasFactory;

    protected $fillable = [
        'motivo', 
        'fecha', 
        'hora', 
        'estado', 
        'mascota_id', 
        'veterinario_id' 
    ];

    // Relación de una cita pertenece a una mascota
    public function mascota()
    {
        return $this->belongsTo(Mascota::class);
    }

    // Relación de una cita pertenece a un veterinario 
    public function veterinario()
    {
        return $this->belongsTo(Veterinario::class);
    }
}
