@extends('adminlte::page')

@section('title', 'Seu Cliente')


@section('content_header')
    <h1 class="text-center text-dark"><strong>Informações do Cliente: </strong>{{ $customer->name }}</h1>
    <div class="col-sm-12" style="text-align: end;">
    </div>
@stop

@section('content')
    <ul class="list-group">
        <li class="list-group-item">#ID: {{ $customer->id }}</li>
        <li class="list-group-item">Nome: {{ $customer->name }}</li>
        <li class="list-group-item">CPF: {{ $customer->cpf }}</li>
        <li class="list-group-item">CNPJ: {{ $customer->cnpj }}</li>
        <li class="list-group-item">Rua: {{ $customer->address }}</li>
        <li class="list-group-item">Cidade/Estado: {{ $customer->district }}</li>
        <li class="list-group-item">Número do Endereço: {{ $customer->address_number }}</li>
        <li class="list-group-item">Número de Telefone: {{ $customer->phone }}</li>
        <li class="list-group-item">E-mail: {{ $customer->email }}</li>
        <div class="col-sm-12" style="text-align: end;">
            <a href="{{ route('customers.index') }}" value="Voltar" class="btn btn-outline-dark btn-md">Voltar</a>
            </a>
        </div>
    </ul>
    <form action="{{ route('customers.destroy', $customer->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-outline-danger">Deletar</button>
    </form>
@stop
