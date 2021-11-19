@extends('adminlte::page')

@section('title', 'Sua Empresa')


@section('content_header')
<h1 class="text-center text-dark"><strong>Informações da Empresa: </strong>{{ $company->fantasy_name }}</h1>
<div class="col-sm-12" style="text-align: end;">
</div>
@stop

@section('content')
<ul class="list-group">
    <li class="list-group-item">#ID: {{ $company->id }}</li>
    <li class="list-group-item">Nome Social: {{ $company->social_reason }}</li>
    <li class="list-group-item">Nome Fantasia: {{ $company->fantasy_name }}</li>
    <li class="list-group-item">CNPJ: {{ $company->cnpj }}</li>
    <li class="list-group-item">Rua: {{ $company->address }}</li>
    <li class="list-group-item">Cidade/Estado: {{ $company->district}}</li>
    <li class="list-group-item">Número do Endereço: {{ $company->address_number }}</li>
    <li class="list-group-item">Número de Telefone: {{ $company->phone }}</li>
    <li class="list-group-item">E-mail: {{ $company->email }}</li>
    <div class="col-sm-12" style="text-align: end;">
        <a href="{{ route('companies.index')}}" value="Back" class="btn btn-outline-dark btn-md">Back</a>
        </a>
    </div>
  </ul>
  <form action="{{ route('companies.destroy', $company->id) }}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-outline-danger">Deletar a empresa: {{$company->fantasy_name}}</button>
  </form>
@stop
