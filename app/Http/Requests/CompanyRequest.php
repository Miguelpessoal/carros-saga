<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{

    public function rules()
    {
        return [
            'social_reason' => 'required',
            'fantasy_name'  => 'required',
            'cnpj'          => 'required|unique:companies,cnpj',
            'address'       => 'required|',
            'district'      => 'required',
            'address_number'=> 'required|numeric',
            'phone'         => 'required',
            'email'         => 'required|email',
        ];
    }

    public function messages()
    {
        return [
        'social_reason.required' => 'Informe um Nome Social',
        'fantasy_name.required'  => 'Informe um Nome Fantasia',
        'cnpj.required'          => 'Informe um CNPJ',
        'cnpj.unique'            => 'CNPJ já cadastrado',
        'address'                => 'Informe um Endereço',
        'district.required'      => 'Informe sua (Cidade/Estado)',
        'address_number.required'=> 'Informe um Número de Endereço',
        'address_number.numeric' => 'Informe um Número de Endereço válido',
        'phone.required'         => 'Informe um Telefone',
        'email.required'         => 'Informe um E-mail',
        ];    
    }
}