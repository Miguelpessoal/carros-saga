<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRentRequest extends FormRequest
{
    public function rules()
    {
        return [
            'rent_date' => 'required|date',
            'devolution_date' => 'required_with:finished|date|nullable',
            'value' => 'required|numeric',
            'km_traveled' => 'required|numeric',
            'km_finish' => 'required|numeric',
            'finished' => 'required_with:devolution_date|boolean',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'rent_date.required' => 'Informe uma data de aluguel',
            'rent_date.date' => 'Informe uma data válida',
            'devolution_date.required_with' => 'Informe uma data prevista de devolução',
            'devolution_date.date' => 'Informe uma data válida',
            'value.required' => 'Informe um valor para o aluguel',
            'value.numeric' => 'Informe um valor válido',
            'km_finish.required' => 'Informe a quilometragem atual',
            'km_finish.numeric' => 'Informe uma quilometragem válida',
            'finished.required_with' => 'Marque a checkbox',
            'finished.boolean' => 'Marque a checkbox',
            'description.required' => 'Informe a descrição'
        ];
    }
}
