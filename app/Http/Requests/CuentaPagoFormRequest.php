<?php

namespace sis_Inventario\Http\Requests;

use sis_Inventario\Http\Requests\Request;

class CuentaPagoFormRequest extends Request
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
            'nmro_cuenta'=>'max:250',
            'instituciones_id'=>'max:250',
            'users_id'=>'max:250',
            'tipo_cuenta'=>'max:250',
        ];
    }
}
