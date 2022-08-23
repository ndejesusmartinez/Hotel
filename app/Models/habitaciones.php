<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class habitaciones extends Model
{
    use HasFactory;
    protected $fillable = [
        'HAB_NOMBRE',
        'HAB_TIPO',
        'HAB_PRECIO',
        
    ];
}
