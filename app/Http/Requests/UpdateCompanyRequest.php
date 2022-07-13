<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCompanyRequest extends FormRequest
{

    public function rules()
    {
        return [
            'social_reason' => 'required|string',
            'fantasy_name'  => 'required|string',
            'cnpj' => [
                'required ',
                'formato_cnpj',
                'cnpj',
                Rule::unique('companies')->ignore($this->route('company')->id)
            ],
            'address'       => 'required|string',
            'district'      => 'required|string',
            'address_number' => 'required|numeric',
            'phone'         => 'required|celular_com_ddd',
            'email'         => 'required|email',
        ];
    }

    public function messages()
    {
        return [
            'social_reason.required' => 'Informe um Nome Social',
            'social_reason.string' => 'Informe um Nome Social válido',
            'fantasy_name.required'  => 'Informe um Nome Fantasia',
            'fantasy_name.string' => 'Informe um Nome Fantasia válido',
            'cnpj.required'          => 'Informe um CNPJ',
            'cnpj.unique'            => 'CNPJ já cadastrado',
            'cnpj.cnpj'              => 'Informe um CNPJ válido',
            'cnpj.formato_cnpj'      => 'Informe um CNPJ válido ex: 00.000.000/0000-00',
            'address.required'       => 'Informe um Endereço',
            'address.string'         => 'Informe um Endereço válido',
            'district.required'      => 'Informe sua (Cidade/Estado)',
            'district.string'        => 'Informe sua (Cidade/Estado) corretamente',
            'address_number.required' => 'Informe um Número de Endereço',
            'address_number.numeric' => 'Informe um Número de Endereço válido',
            'phone.required'         => 'Informe um Telefone',
            'phone.celular_com_ddd'  => 'Informe um Telefone válido ex: (11) 99999-9999',
            'email.required'         => 'Informe um E-mail',
        ];
    }
}
