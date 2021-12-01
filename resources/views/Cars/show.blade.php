@extends('adminlte::page')

@section('title', 'Adicionar novo Carro')

@section('content_header')
    <h1 class="text-center"><strong>{{ $car->name }}</strong></h1>
@stop

@section('content')
    <div class="container">
        <div id="carouselExampleCaptions" class="carousel slide d-f" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($car->documents as $key => $document)

                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        {{-- <div style="background-image: url({{ tenant_asset($document->path) }}); weight:100%;height:500px"> --}}
                        {{-- </div> --}}
                        <img width="100%" height="500px" src="{{ tenant_asset($document->path) }}" class="d-block "
                            alt="...">
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Próximo</span>
            </button>
        </div>
    </div>
    @if (session('aviso'))
        <div class="alert alert-danger">
            <p>{{ session('aviso') }}</p>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            @csrf
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">Modelo</label>
                        <input type="text" value="{{ $car->name }}" class="form-control" readonly>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">Marca</label>
                        <input type="text" value="{{ $car->brand }}" class="form-control" readonly>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">Cor</label>
                        <input type="text" value="{{ $car->color }}" class="form-control" readonly>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">Placa</label>
                        <input type="text" value="{{ $car->board }}" class="form-control" readonly>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">Ano</label>
                        <input type="text" value="{{ $car->year }}" class="form-control" readonly>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">Quilometragem</label>
                        <input type="text" value="{{ $car->km }}" class="form-control" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">Valor</label>
                        <input type="text" value="{{ $car->value }}" class="form-control" readonly>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">Assegurado</label>
                        <input type="checkbox" class="form-control" name="safe" id="checkbox">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">Nome da Asseguradora</label>
                        <input type="text" value="{{ $car->insurance_company }}" class="form-control" readonly>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-6">
                    <label for="">Situação do Carro</label>
                    <input type="text" value="{{ $car->car_situation }}" class="form-control" readonly>
                </div>
                <div class="col-sm-6">
                    <label for="">Tipo de Combustível</label>
                    <input type="text" value="{{ $car->fuel }}" class="form-control" readonly>
                </div>
            </div>
            <br>
            <div class="form-group" style="text-align: end;">
                <a href="{{ route('cars.index') }}" value="Voltar" class="btn btn-outline-dark btn-md">Voltar</a>
            </div>
        </div>
    </div>

    <script>
        const car = @json($car)
    </script>
    <script>
        const checkBoxElement = document.querySelectorAll("#checkbox")[0]

        car.safe ? checkBoxElement.checked = true : ''
    </script>

    {{-- JavaScript --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
@stop
