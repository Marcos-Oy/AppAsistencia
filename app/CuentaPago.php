<?php

namespace sis_Inventario;

use Illuminate\Database\Eloquent\Model;

class CuentaPago extends Model
{
    protected $table='cuenta_pago';

    protected $primaryKey= 'nmro_cuenta';
    
    
    public $timestamps=false;
    
    protected $fillable = [
        'users_id', 'tipo_cuenta','instituciones_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
