<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitude extends Model
{
    use HasFactory;

    protected $fillable = [
        'FechaEnvio',
        'FechaSolicitada',
        'HoraSolicitada',
        'NombreSolicitante',
        'ApellidoSolicitante',
        'NumeroTelefono',
        'Email',
        'Status',
        'IdEvento',
    ];
    public $timestamps = false;
}