<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    public static string $IMAGE_DEFAULT = 'https://via.placeholder.com/150';

    protected $table = 'torneos';
    protected $fillable = [
        'nombre',
        'modalidad',
        'superficie',
        'vacantes',
        'categoria',
        'premios',
        'fechaInicio',
        'fechaFin',
        'imagen',
        'isDelete'
    ];

    public function torneos()
    {
        return $this->belongsToMany(Torneo::class);
    }
}


