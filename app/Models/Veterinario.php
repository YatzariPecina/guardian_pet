<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veterinario extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'descripcion',
        'ubicacion',
        'horario',
        'telefono',
        'foto',
    ];

    public function getPhotoPathAttribute($value)
    {
        return asset('storage/' . $value);
    }
}
