<?php

namespace sis_Inventario\Http\Requests;

use sis_Inventario\Http\Requests\Request;

class ActividadesFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'idactividades'=>'required|max:100|regex:/^([A-Z][a-z]+([ ]?[a-z]?[-]?[A-Z][a-z]+)*)$/',
            'user_userrut'=>'required|max:20',
            'Modalidad_idModalidad'=>'required|max:15',
            'Establecimiento_idEstablecimiento'=>'required|max:70',
            'Fecha'=>'required|min:9|max:11',
            'HoraInicio'=>'required|max:50',
            'HoraFin'=>'required|max:50',
            'Observaciones'=>'required|max:250',
        ];
    }
}
