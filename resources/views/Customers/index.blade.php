@extends('adminlte::page')

@section('title', 'Clientes Page')

@section('content_header')
    <h1 class="text-center text-dark"><strong>Clientes Cadastrados</strong></h1>
    <div class="col-sm-12" style="text-align: end;">
        <a href="/customers/create" class="btn btn-outline-primary btn-sm">
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
                <th scope="col">Nome</th>
                <th scope="col">Telefone de Contato</th>
                <th scope="col">Email</th>
                <th scope="col">Gerenciar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <th scope="row">{{ $customer->id }}</th>
                    <th scope="row">{{ $customer->name }}</th>
                    <th scope="row">{{ $customer->phone }}</th>
                    <th scope="row">{{ $customer->email }}</th>
                    <td style="display:flex">

                        <a href="{{ route('customers.show', $customer->id) }}" title="Informar"
                            class="btn btn-outline-primary btn-sm mr-2">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('customers.edit', $customer->id) }}" title="Editar"
                            class="btn btn-outline-success btn-sm">
                            <i class="far fa-edit"></i>
                        </a>
                        <div class="col-sm-12">
                            <form action={{ route('customers.destroy', $customer->id) }} method="post">
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
