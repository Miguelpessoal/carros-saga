@extends('adminlte::page')

@section('title', 'Adicionar novo Carro')

@section('content_header')
    <h1 class="text-center">Adicionar novo Carro</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <form action={{ route('cars.store') }} method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Modelo</label>
                            <input type="text" value="{{ isset($car) ? $car->name : null }}" class="form-control"
                                name="name" required>
                        </div>













            </form>
        </div>
    </div>


@stop
