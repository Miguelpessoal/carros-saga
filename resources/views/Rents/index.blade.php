@extends('adminlte::page')

@section('title', 'Clientes Page')

@section('content_header')
    <h1 class="text-center text-dark"><strong>Carros Alugados:</strong></h1>
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
                <th scope="col">Carro Alugado</th>
                <th scope="col">Nome do Cliente</th>
                <th scope="col">Data do Aluguel</th>
                <th scope="col">Gerenciar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rents as $rent)
                <tr>
                    <th scope="row">{{ $rent->id }}</th>
                    <th scope="row">{{ $rent->car->name }}</th>
                    <th scope="row">{{ $rent->customer->name }}</th>
                    <th scope="row">{{ $rent->rent_date }}</th>
                    <td style="display:flex">
                        <a href="{{ route('rents.edit', $rent->id) }}" title="Editar"
                            class="btn btn-outline-success btn-sm mr-2">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('rents.destroy', $rent->id) }}" method="post">
                            <button title="Devolver" type="submit" class="btn btn-outline-danger btn-sm mr-2">
                                @csrf
                                @method('DELETE')
                                <i class="fas fa-undo-alt"></i>
                            </button>
                        </form>
                </tr>
            @endforeach


            </tr>
        </tbody>
    </table>
@stop
