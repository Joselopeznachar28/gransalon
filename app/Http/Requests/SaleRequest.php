<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'sale_type'                         => 'required',
            'products'                          => 'present|array',
            'products.*.name'                   => 'required',
            'products.*.price'                  => 'required',
            'products.*.quantity'               => 'required',
            'products.*.concessionaire_id'      => 'required',
        ];
    }

    public function messages()
    {
        return [
            
            'sale_type.required' => 'Debe elegir un tipo de venta!',

            'products.*.name.required' => 'Elija el Producto',

            'products.*.price.required' => 'Elija el precio del producto',

            'products.*.quantity.required' => 'Ingrese la cantidad del producto',

            'products.*.concessionaire_id.required' => 'Elija el Aliad',
        ];
    }
}
