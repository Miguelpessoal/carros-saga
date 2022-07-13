<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name'          => 'required|string|max:255',
            'cpf' => [
                'required_without:cnpj',
                Rule::unique('customers')->ignore($this->route('customer')->id), 'max:14'
            ],

            'cnpj' => [
                'required_without:cpf',
                Rule::unique('customers')->ignore($this->route('customer')->id), 'max:18'
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
            'name.required'          => 'Informe um Nome',
            'name.string'            => 'Informe um Nome válido',
            'cpf.required_without'   => 'Informe um CPF',
            'cpf.unique'             => 'CPF já cadastrado',
            'cpf.max'                => 'Informe um CPF válido',
            'cpf.cpf'                => 'Informe um CPF válido',
            'cpf.formato_cpf'        => 'Informe um CPF válido ex: 000.000.000-00',
            'cnpj.unique'            => 'CNPJ já cadastrado',
            'cnpj.required_without'  => 'Informe um CNPJ',
            'cnpj.max'               => 'Informe um CNPJ válido',
            'cnpj.cnpj'              => 'Informe um CNPJ válido',
            'cnpj.formato_cnpj'      => 'Informe um CNPJ válido ex: 00.000.000/0000-00',
            'address'                => 'Informe um Endereço',
            'district.required'      => 'Informe sua (Cidade/Estado)',
            'address_number.required' => 'Informe um Número de Endereço',
            'address_number.numeric' => 'Informe um Número de Endereço válido',
            'phone.celular_com_ddd'         => 'Informe um Telefone',
            'email.required'         => 'Informe um E-mail',
            'email.email'            => 'Informe um E-mail válido',
        ];
    }
}
