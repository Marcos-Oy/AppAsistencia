<?php

namespace sis_Inventario;

use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    protected $table='instituciones';

    protected $primaryKey='id';

    public $timestamps=false;
    
    protected $fillable = [
        'tipo', 'codigoSBIF', 'codigoRegistro', 'nombre',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
