<?php

namespace sis_Inventario;

use Illuminate\Database\Eloquent\Model;

class Establecimiento extends Model
{
    protected $table='establecimiento';

    protected $primaryKey='idestablecimiento';

    public $timestamps=false;
    
    protected $fillable = [
        'descestablecimiento',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
