<?php

namespace sis_Inventario\Http\Requests;

use sis_Inventario\Http\Requests\Request;

class BancoFormRequest extends Request
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
            'id'=>'max:100|regex:/^([A-Z][a-z]+([ ]?[a-z]?[-]?[A-Z][a-z]+)*)$/',
            'tipo'=>'max:250',
            'codigoSBIF'=>'max:250',
            'codigoRegistro'=>'max:250',
            'nombre'=>'max:250',
        ];
    }
}
