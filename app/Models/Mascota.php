<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 
        'especie', 
        'raza', 
        'edad', 
        'sexo', 
        'caracteristicas', 
        'foto', 
        'user_id'
    ];

    // Relación de una mascota que pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function citas()
    {
        return $this->hasMany(Citas::class);
    }
}
