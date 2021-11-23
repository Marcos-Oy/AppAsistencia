<?php

namespace sis_Inventario;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table='actividades';

    protected $primaryKey='id';
    
    protected $fillable = [
        'asiste',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
