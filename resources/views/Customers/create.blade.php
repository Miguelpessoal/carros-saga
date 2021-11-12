@extends('adminlte::page')

@section('title', 'Clientes Home Page')

@section('content_header')
<h1 class="m-0 text-dark">Gerenciamento de clientes:</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action={{ route('customers.store') }} method="post">
            @csrf
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">Nome</label>
                        <input type="text" value="{{ isset($customer) ? $customer->name : null }}" 
                        name="name" class="form-control" required>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">CPF</label>
                        <input type="text" value="{{ isset($customer) ? $customer->cpf : null }}" 
                        name="cpf" class="form-control"required>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">CNPJ</label>
                        <input type="text" value="{{ isset($customer) ? $customer->cnpj : null }}" 
                        name="cnpj" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">Rua</label>
                        <input type="text" value="{{ isset($customer) ? $customer->address : null }}" 
                        name="address" class="form-control" required>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">Cidade/Estado</label>
                        <input type="text" value="{{ isset($customer) ? $customer->district : null }}" 
                        name="district" class="form-control" required>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">Número do Endereço</label>
                        <input type="integer" value="{{ isset($customer) ? $customer->address_number : null }}"
                            name="address_number" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">

                    <div class="form-group">
                        <label for="">Telefone</label>
                        <input type="text" value="{{ isset($customer) ? $customer->phone : null }}" 
                        name="phone" class="form-control" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" value="{{ isset($customer) ? $customer->email : null }}" 
                        name="email" class="form-control" required>
                    </div>
                </div>
            </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
        </form>
    </div>
</div>
@stop