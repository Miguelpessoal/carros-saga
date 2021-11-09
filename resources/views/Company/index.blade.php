@extends('adminlte::page')

@section('title', 'Home Page')

@section('content_header')
    <h1 class="text-center text-dark">Empresas incritas na coorporação:</h1>
    <div class="col-sm-12" style="text-align: end;">
    <button href="{{-- {{route('Company.create')}} --}}"class="btn btn-outline-primary">
        <i class="fas fa-plus"></i>
    </button>
    </div>
@stop

@section('content')
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Nome Social</th>
                <th scope="col">Nome de Fantasia</th>
                <th scope="col">Telefone de Contato</th>
                <th scope="col">Gerenciar</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>miguel</td>
                <td>miguel</td>
                <td>miguel</td>
                <td href="" value ="Informar" class="btn btn-outline-warning btn-sm">
                    <i class="fas fa-info"></i>
                </td>
                <td href="" value ="Editar" class="btn btn-outline-dark btn-sm">
                    <i class="far fa-edit"></i></td>
                <td href="" value ="Apagar" class="btn btn-outline-danger btn-sm">
                    <i class="fas fa-trash-alt"></i>
                </td>
            </tr>
        </tbody>
    </table>
@stop
