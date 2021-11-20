<?php

namespace sis_Inventario;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table='actividades';

    protected $primaryKey='idactividades';
    
    protected $fillable = [
        'user_userrut', 'Modalidad_idModalidad', 'Establecimiento_idEstablecimiento', 'Fecha', 'HoraInicio', 'HoraFin', 'Observaciones',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
