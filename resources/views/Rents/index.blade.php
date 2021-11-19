@extends('adminlte::page')

@section('title', 'Carros Page')


@section('content_header')
    <h1 class="text-center"><strong>Carros disponíveis para aluguel:</strong></h1>
    <div class="col-sm-12" style="text-align: end;">
        <a href="/customers/create" class="btn btn-outline-primary btn-sm" title="Cadastrar Cliente">
            <i class="fas fa-plus"></i>
        </a>
    </div>
@stop

@section('content')
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#Código</th>
                <th scope="col">Modelo</th>
                <th scope="col">Marca</th>
                <th scope="col">Cor</th>
                <th scope="col">Ano</th>
                <th scope="col">Placa</th>
                <th scope="col">Assegurado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
                <tr>
                    <th scope="row">{{ $car->id }}</th>
                    <th scope="row">{{ $car->name }}</th>
                    <th scope="row">{{ $car->brand }}</th>
                    <th scope="row">{{ $car->color }}</th>
                    <th scope="row">{{ $car->year }}</th>
                    <th scope="row">{{ $car->blade }}</th>
                    <th scope="row">{{ $car->safe ? 'Sim' : 'Não' }}</th>
                    <td style="display:flex">
                        <div class="col-sm-12">
                            <form action="" method="post">
                                <button method="post" type="submit" title="Alugar" class="btn btn-outline-success btn-sm">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
