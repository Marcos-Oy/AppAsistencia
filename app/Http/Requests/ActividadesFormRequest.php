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
            'id'=>'required|max:100|regex:/^([A-Z][a-z]+([ ]?[a-z]?[-]?[A-Z][a-z]+)*)$/',
            'asiste'=>'required|max:20',
        ];
    }
}
