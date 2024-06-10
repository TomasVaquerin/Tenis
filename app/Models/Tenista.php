<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenista extends Model
{
    public static string $IMAGE_DEFAULT = 'https://via.placeholder.com/150';

    protected $table = 'tenistas';
    protected $fillable = [
        'nombre',
        'apellido',
        'ranking',
        'pais',
        'FechaNacimiento',
        'edad',
        'Altura',
        'peso',
        'Mano',
        'reves',
        'entrenador',
        'totalDineroGanado',
        'numeroVictorias',
        'numeroDerrotas',
        'imagen',
        'puntos'
    ];

    public function torneos()
    {
        return $this->belongsToMany(Torneo::class);
    }
}
