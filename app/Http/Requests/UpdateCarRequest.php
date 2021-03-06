<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCarRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'brand' => 'required|max:255',
            'color' => 'required|max:255',
            'board' => [
                'required',
                Rule::unique('cars')->ignore($this->route('car')->id),
            ],
            'year' => 'required|numeric|max:9999',
            'km' => 'required|numeric',
            'value' => 'required|numeric',
            'insurance_company' => 'max:255',
            'car_situation' => 'required|max:255',
            'fuel' => 'required|max:20',
            'safe' => 'sometimes|nullable',
            'image'=> 'nullable|image'
        ];  
    }

    public function messages()
    {
        return [
        'name.required' => 'Informe o modelo',
        'brand.required' => 'Informe a marca',
        'color.required' => 'Informe a cor',
        'board.required' => 'Informe a placa',
        'board.unique' => 'A placa informada já existe',
        'year.required' => 'Informe um ano',
        'year.numeric' => 'Informe um ano valido',
        'year.max' => 'Informe um ano com no máximo 4 caracteres',
        'km.required' => 'Informe a quilometragem',
        'km.numeric' => 'Informe uma quilometragem valida',
        'value.required' => 'Informe o valor',
        'value.numeric' => 'Informe um valor valido',
        'car_situation.required' => 'Informe a situação do veículo',
        'fuel.required' => 'Informe o tipo de combustivel',
        ];  
    }
}
