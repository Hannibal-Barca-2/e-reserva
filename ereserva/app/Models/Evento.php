<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = [
        'NombreEvento',
        'Descripcion',
        'IdUsuario'
    ];
    
    public $timestamps = false;

    public function eventosSolicitudes()
    {
        return $this->hasMany('App\Models\Solicitud');
    }

    public function eventosHorarios()
    {
        return $this->hasMany('App\Models\Horario');
    }
}