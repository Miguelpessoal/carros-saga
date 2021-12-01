@extends('adminlte::page')

@section('title', 'Adicionar novo Carro')

@section('content_header')
    <h1 class="text-center"><strong>Adicionar Carro</strong></h1>
@stop

@section('content')
    @if (session('aviso'))
        <div class="alert alert-danger">
            <p>{{ session('aviso') }}</p>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <form action={{ route('cars.store') }} method="post" enctype="multipart/form-data">
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
                            <input type="checkbox" value="{{ $car->safe }}" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Nome da Asseguradora</label>
                            <input type="text" value="{{ $car->insurance_company }}"
                                class="form-control" readonly>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <label for="">Situação do Carro</label>
                        <input type="text" value="{{ $car->car_situation }}" class="form-control" readonly>
                    </div>
                    <div class="col-sm-4">
                        <label for="">Tipo de Combustível</label>
                        <input type="text" value="{{ $car->fuel }}" class="form-control" readonly>
                    </div>
                    <div class="col-sm-4">
                        <label for="">Fotos do Carro</label>
                        <input required type="file" class="form-control" name="images[]" placeholder="imagens" multiple>
                    </div>
                </div>
                <br>
                <div class="form-group" style="text-align: end;">
                    <button type="submit" class="btn btn-outline-primary btn-md">Cadastrar</button>
                    <a href="{{ route('cars.index') }}" value="Voltar" class="btn btn-outline-dark btn-md">Voltar</a>
                </div>
            </form>
        </div>
    </div>
@stop


@extends('adminlte::page')

@section('title', 'Visualizar Carro')

@section('content_header')
    <h1 class="text-center"><strong>Visualizando:</strong> {{ $car->name }}</h1>
@stop

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
    <ul class="list-group">
        <li class="list-group-item">Código: {{ $car->id }}</li>
        <li class="list-group-item">Nome: {{ $car->name }}</li>
        <li class="list-group-item">Marca: {{ $car->brand }}</li>
        <li class="list-group-item">Color: {{ $car->color }}</li>
        <li class="list-group-item">Placa: {{ $car->blade }}</li>
        <li class="list-group-item">Ano: {{ $car->year }}</li>
        <li class="list-group-item">KM: {{ $car->km }}</li>
        <li class="list-group-item">Valor: {{ $car->value }}</li>
        <li class="list-group-item">Assegurado: {{ $car->safe }}</li>
        <li class="list-group-item">Asseguradora: {{ $car->insurance_company }}</li>
        <li class="list-group-item">Situação do carro: {{ $car->car_situation }}</li>
        <li class="list-group-item">Tipo de combustível: {{ $car->fuel }}</li>

        <div class="col-sm-12" style="text-align: end;">
            <a href="{{ route('cars.index') }}" value="Voltar" class="btn btn-outline-dark btn-md">Voltar</a>
            </a>
        </div>
    </ul>



    {{-- JavaScript --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
@stop
