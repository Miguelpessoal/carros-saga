@extends('adminlte::page')

@section('title', 'Carros Page')


@section('content_header')
    <h1 class="text-center"><strong>Todos os Carros:</strong></h1>
    <div class="col-sm-12" style="text-align: end;">
        <a href="/cars/create" class="btn btn-outline-primary btn-sm">
            <i class="fas fa-plus"></i>
        </a>
    </div>
@stop

@section('content')

    <table class="table table-hover">
        <thead>
            @if (session('mensagem'))
                <div class="alert alert-success">
                    <p>{{ session('mensagem') }}</p>
                </div>
            @endif

            @if (session('aviso'))
                <div class="alert alert-danger">
                    <p>{{ session('aviso') }}</p>
                </div>
            @endif
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Modelo</th>
                <th scope="col">Marca</th>
                <th scope="col">Cor</th>
                <th scope="col">Placa</th>
                <th scope="col">Ano</th>
                <th scope="col">Assegurado</th>
                <th scope="col">Disponível</th>
                <th scope="col">Gerenciar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
                <tr>
                    <th scope="row">{{ $car->id }}</th>
                    <th scope="row">{{ $car->name }}</th>
                    <th scope="row">{{ $car->brand }}</th>
                    <th scope="row">{{ $car->color }}</th>
                    <th scope="row">{{ $car->board }}</th>
                    <th scope="row">{{ $car->year }}</th>
                    <th scope="row">
                        <spam class="label text-{{ $car->safe ? 'success' : 'danger' }}">{{ $car->safe ? 'Sim' : 'Não' }}
                        </spam>
                    </th>
                    <th scope="row">
                        <spam class="label text-{{ $car->isAvailable ? 'success' : 'danger' }}">
                            {{ $car->isAvailable ? 'Sim' : 'Não' }}</spam>
                    </th>
                    <td style="display:flex">
                        <a href="{{ route('cars.show', $car->id) }}" title="Visualizar"
                            class="btn btn-outline-primary btn-sm mr-2">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('cars.edit', $car->id) }}" title="Editar"
                            class="btn btn-outline-success btn-sm">
                            <i class="far fa-edit"></i>
                        </a>
                        <a href="{{ route('cars.rents.create', $car) }} " title="Alugar"
                            class="btn btn-outline-info btn-sm">
                            <i class="fas fa-comments-dollar"></i>
                        </a>
                        <div class="col-sm-12">
                            <form action={{ route('cars.destroy', $car->id) }} method="post">
                                <button onclick="return confirm('Deseja realmente deletar?');" method="post" type="submit"
                                    title="Deletar" class="btn btn-outline-danger btn-sm">
                                    @csrf
                                    @method('DELETE')
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
