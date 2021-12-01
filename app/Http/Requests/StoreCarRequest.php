<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        $this->merge([
            'safe' => $this->has('safe')
        ]);
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'board' => 'required|unique:cars,board|max:255',
            'year' => 'required|numeric|max:9999',
            'km' => 'required|numeric',
            'value' => 'required|numeric',
            'insurance_company' => 'string|max:255',
            'car_situation' => 'string|required|max:255',
            'fuel' => 'string|required|max:20',
            'safe' => 'sometimes|nullable',
            'image' => 'nullable|image'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Informe o modelo',
            'name.string' => 'Informe um modelo válido',
            'brand.required' => 'Informe a marca',
            'brand.string' => 'Informe uma marca válida',
            'color.required' => 'Informe a cor',
            'color.string' => 'Informe uma cor válida',
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
            'car_situation.string' => 'Informe uma situação válida',
            'fuel.required' => 'Informe o tipo de combustivel',
            'fuel.string' => 'Informe um tipo de combustivel válido',
        ];
    }
}
