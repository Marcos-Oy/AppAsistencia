<?php

namespace sis_Inventario;

use Illuminate\Database\Eloquent\Model;

class Actividades extends Model
{
    protected $table='actividades';

    protected $primaryKey='id';

    public $timestamps=false;
    
    protected $fillable = [
        'user_id', 'establecimiento_id','Fecha', 'HoraInicio', 'HoraFin', 'Observaciones',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
