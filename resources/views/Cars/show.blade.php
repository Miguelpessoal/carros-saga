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
            @foreach ($documents as $key => $document)
  
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }} "
                    style="background-image: url({{ $document->path }}">
                    <img whidt="500" height="500" src="{{ url("{$document->path}") }}" class="d-block w-100 h-80"
                        alt="...">
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
  </div>
    <ul class="list-group">
      <li class="list-group-item">Código: {{ $car->id }}</li>
      <li class="list-group-item">Nome: {{ $car->name }}</li>
      <li class="list-group-item">Marca: {{ $car->brand }}</li>
      <li class="list-group-item">Color: {{ $car->color }}</li>
      <li class="list-group-item">Placa: {{ $car->blade }}</li>
      <li class="list-group-item">Ano: {{ $car->year}}</li>
      <li class="list-group-item">KM: {{ $car->km }}</li>
      <li class="list-group-item">Valor: {{ $car->value }}</li>
      <li class="list-group-item">Assegurado: {{ $car->safe }}</li>
      <li class="list-group-item">Asseguradora: {{ $car->insurance_company }}</li>
      <li class="list-group-item">Situação do carro: {{ $car->car_situation }}</li>
      <li class="list-group-item">Tipo de combustível: {{ $car->fuel }}</li>
      
      <div class="col-sm-12" style="text-align: end;">
        <a href="{{ route('cars.index')}}" value="Back" class="btn btn-outline-dark btn-md">Back</a>
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
