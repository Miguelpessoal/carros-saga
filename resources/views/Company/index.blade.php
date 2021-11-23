@extends('adminlte::page')

@section('title', 'Home Page')

@section('content_header')
    <h1 class="text-center text-dark"><strong>Empresas incritas na corporação:</strong></h1>
    <div class="col-sm-12" style="text-align: end;">
        <a href="/companies/create/" class="btn btn-outline-primary btn-sm">
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
                <th scope="col">Nome Social</th>
                <th scope="col">Nome de Fantasia</th>
                <th scope="col">Telefone de Contato</th>
                <th scope="col">Gerenciar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
                <tr>
                    <th scope="row">{{ $company->id }}</th>
                    <th scope="row">{{ $company->social_reason }}</th>
                    <th scope="row">{{ $company->fantasy_name }}</th>
                    <th scope="row">{{ $company->phone }}</th>
                    <td style="display:flex">

                        <a href="{{ route('companies.show', $company->id) }}" title="Visualizar"
                            class="btn btn-outline-primary btn-sm mr-2">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('companies.edit', $company->id) }}" title="Editar"
                            class="btn btn-outline-success btn-sm">
                            <i class="far fa-edit"></i>
                        </a>
                        <div class="col-sm-12">
                            <form action={{ route('companies.destroy', $company->id) }} method="post">
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
