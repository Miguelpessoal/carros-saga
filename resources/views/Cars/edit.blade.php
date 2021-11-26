@extends('adminlte::page')

@section('title', 'Editar Carro')

@section('content_header')
    <h1 class="m-0 text-dark text-center"><strong>Edição do carro:</strong></h1>
@stop

@section('content')
    @if (session('aviso'))
        <div class="alert alert-danger">
            <p>{{ session('aviso') }}</p>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <form action={{ route('cars.update', $car->id) }} method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Modelo</label>
                            <input type="text" value="{{ isset($car) ? $car->name : null }}" name="name"
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Marca</label>
                            <input type="text" value="{{ isset($car) ? $car->brand : null }}" name="brand"
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Cor</label>
                            <input type="text" value="{{ isset($car) ? $car->color : null }}" name="color"
                                class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Placa</label>
                            <input type="text" value="{{ isset($car) ? $car->board : null }}" name="board"
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Ano</label>
                            <input type="text" value="{{ isset($car) ? $car->year : null }}" name="year"
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Quilometragem</label>
                            <input type="integer" value="{{ isset($car) ? $car->km : null }}" name="km"
                                class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Valor</label>
                            <input type="text" value="{{ isset($car) ? $car->value : null }}" name="value"
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Assegurado</label>
                            <input type="checkbox" value="{{ isset($car) ? $car->safe : null }}" class="form-control"
                                name="safe">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Nome da Asseguradora</label>
                            <input type="text" value="{{ isset($car) ? $car->insurance_company : null }}"
                                class="form-control" name="insurance_company">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9">
                        <label for="">Situação do Carro</label>
                        <input type="text" value="{{ isset($car) ? $car->car_situation : null }}" class="form-control"
                            name="car_situation" required>
                    </div>
                    <div class="col-sm-s">
                        <label for="">Tipo de Combustível</label>
                        <input type="text" value="{{ isset($car) ? $car->fuel : null }}" class="form-control"
                            name="fuel" required>
                    </div>
                    <div class="col-sm-4">
                        <label for="">Fotos do Carro</label>
                        <input type="file" class="form-control" name="images[]" placeholder="imagens" multiple>
                    </div>
                </div>
                <br />
                <br />
                <br>
                <div class="form-group" style="text-align: end;">
                    <button type="submit" class="btn btn-outline-success btn-md">Atualizar</button>
                </div>
                <div class="  form-group" style="text-align: end;">
                    <a href="{{ route('cars.index') }}" value="Back" class="btn btn-outline-dark btn-md">Back</a>
                </div>
            </form>
            <table class="table table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Arquivo</th>
                        <th scope="col">Data de Criação</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($car->documents as $document)
                        <tr>
                            <th scope="row">{{ $document->title }}</th>
                            <th scope="row">{{ $document->created_at }}</th>
                            <th scope="row">
                                <form action={{ route('documents.destroy', $document->id) }} method="post">
                                    <button onclick="return confirm('Deseja realmente deletar?');" method="post"
                                        type="submit" title="Deletar" class="btn btn-outline-danger btn-sm">
                                        @csrf
                                        @method('DELETE')
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
