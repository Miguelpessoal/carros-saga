<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRentRequest extends FormRequest
{
    public function rules()
    {
        return [
            'rent_date' => 'required|date',
            'customer_id' => 'required',
            'forecast_devolution_date' => 'required|date',
            'devolution_date' => 'required_with:finished|date|nullable',
            'value' => 'required|numeric',
            'km_traveled' => 'required|numeric',
            'finished' => 'required_with:devolution_date|boolean',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'rent_date.required' => 'Informe uma data de aluguel',
            'customer_id' => 'Informe um cliente',
            'forecast_devolution_date.required' => 'Informe a data prevista',
            'forecast_devolution_date.date' => 'Informe uma data válida',
            'rent_date.date' => 'Informe uma data válida',
            'devolution_date.required_with' => 'Informe uma data prevista de devolução',
            'devolution_date.date' => 'Informe uma data válida',
            'value.required' => 'Informe um valor para o aluguel',
            'value.numeric' => 'Informe um valor válido',
            'km_traveled.required' => 'Informe a quantidade de quilômetros do carro',
            'km_traveled.numeric' => 'Informe uma quantidade válida de quilômetros',
            'finished.required_with' => 'Marque a checkbox',
            'finished.boolean' => 'Marque a checkbox',
            'description.required' => 'Informe a descrição'
        ];
    }
}
