<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservas extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombres',
        'apellido1',
        'apellido2',
        'tipo_id',
        'identificacion',
        'entrada',
        'salida',
        'email',
        'tel',
        'tipo_hab',
    ];
}
