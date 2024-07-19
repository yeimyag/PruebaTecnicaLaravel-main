<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'descripcion',
        'fecha_vencimiento',
        'completado',
        'id_usuario'
    ];
}
