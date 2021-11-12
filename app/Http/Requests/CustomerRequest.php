<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name'          => 'required|max:255',
            'cpf'           => 'required|unique|max:14',
            'cnpj'          => 'nullable|unique|max:18', 
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
        'name.required'          => 'Informe um Nome',
        'cpf.required'           => 'Informe um CPF',
        'cpf.unique'             => 'CPF já cadastrado',
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
