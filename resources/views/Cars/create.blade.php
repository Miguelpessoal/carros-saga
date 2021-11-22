@extends('adminlte::page')

@section('title', 'Adicionar novo Carro')

@section('content_header')
    <h1 class="text-center"><strong>Adicionar novo Carro</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action={{ route('cars.store') }} method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Modelo</label>
                            <input type="text" value="{{ isset($car) ? $car->name : null }}" class="form-control"
                                name="name" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Marca</label>
                            <input type="text" value="{{ isset($car) ? $car->brand : null }}" class="form-control"
                                name="brand" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Cor</label>
                            <input type="text" value="{{ isset($car) ? $car->color : null }}" class="form-control"
                                name="color" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Placa</label>
                            <input type="text" value="{{ isset($car) ? $car->board : null }}" class="form-control"
                                name="board" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Ano</label>
                            <input type="text" value="{{ isset($car) ? $car->year : null }}" class="form-control"
                                name="year" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Quilometragem</label>
                            <input type="text" value="{{ isset($car) ? $car->km : null }}" class="form-control"
                                name="km" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Valor</label>
                            <input type="text" value="{{ isset($car) ? $car->value : null }}" class="form-control"
                                name="value" required>
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
                    <div class="col-sm-4">
                        <label for="">Situação do Carro</label>
                        <input type="text" value="{{ isset($car) ? $car->car_situation : null }}" class="form-control"
                            name="car_situation" required>
                    </div>
                    <div class="col-sm-4">
                        <label for="">Tipo de Combustível</label>
                        <input type="text" value="{{ isset($car) ? $car->fuel : null }}" class="form-control"
                            name="fuel" required>
                    </div>
                    <div class="col-sm-4">
                        <label for="">Fotos do Carro</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>
                <br>
                <div class="form-group" style="text-align: end;">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
@stop
