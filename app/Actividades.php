<?php

namespace sis_Inventario;

use Illuminate\Database\Eloquent\Model;

class Actividades extends Model
{
    protected $table='actividades';

    protected $primaryKey='id';

    public $timestamps=false;
    
    protected $fillable = [
        'asiste',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
