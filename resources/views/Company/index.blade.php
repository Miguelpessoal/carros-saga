@extends('adminlte::page')

@section('title', 'Home Page')

@section('content_header')
<h1 class="text-center text-dark">Empresas incritas na corporação:</h1>
<div class="col-sm-12" style="text-align: end;">
    <a href="/companies/create/" class="btn btn-outline-primary btn-sm">
        <i class="fas fa-plus"></i>
    </a>
</div>
@stop

@section('content')
<table class="table table-hover">
    <thead>
        @if(session('mensagem'))
        <div class="alert alert-success">
            <p>{{session('mensagem')}}</p>
        </div>
        @endif

        @if(session('aviso'))
        <div class="alert alert-danger">
            <p>{{session('aviso')}}</p>
        </div>
        @endif
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">Nome Social</th>
            <th scope="col">Nome de Fantasia</th>
            <th scope="col">Telefone de Contato</th>
            <th scope="col">Gerenciar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($companies as $company)
        <tr>
            <th scope="row">{{$company->id}}</th>
            <th scope="row">{{$company->social_reason}}</th>
            <th scope="row">{{$company->fantasy_name}}</th>
            <th scope="row">{{$company->phone}}</th>
            <td>

                <a href="{{route('companies.show', $company->id)}}" value="Informar" class="btn btn-outline-info btn-sm">
                    <i class="fas fa-info"></i>
                </a>
                <a href="{{ route('companies.edit', $company->id) }}" value="Editar"
                    class="btn btn-outline-success btn-sm">
                    <i class="far fa-edit"></i></a>
            </td>


        </tr>
        @endforeach
    </tbody>
</table>
@stop