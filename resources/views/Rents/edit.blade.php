@extends('adminlte::page')

@section('title', 'Tela de aluguel')

@section('content_header')
    <h1 class="text-center"><strong>Editar aluguel:</strong>{{ $rent->car->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('cars.rents.store', ['car' => $rent->car->id]) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Data do aluguel</label>
                            <input type="date" value="{{ isset($rent) ? $rent->rent_date : null }}" class="form-control"
                                name="rent_date" required>

                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Data prevista para devolução</label>
                            <input type="date" value="{{ isset($rent) ? $rent->forecast_devolution_date : null }}"
                                class="form-control" name="forecast_devolution_date" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Valor do aluguel</label>
                            <input type="text" value="{{ isset($rent) ? $rent->value : null }}" class="form-control"
                                name="value" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">KM Atual</label>
                            <input type="text" value="{{ isset($rent) ? $rent->km_traveled : null }}"
                                class="form-control" name="km_traveled" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">KM Entregue</label>
                            <input type="text" value="{{ isset($rent) ? $rent->km_traveled : null }}"
                                class="form-control" name="km_finish" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Finalizado</label>
                            <input type="checkbox" value="{{ isset($rent) ? $rent->finished : null }}"
                                class="form-control" name="finished" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Descrição</label>
                            <input type="text" value="{{ isset($rent) ? $rent->description : null }}"
                                class="form-control" name="description" required>
                        </div>
                    </div>
                    <label for="customers">Cliente:</label>
                    <select name="customer_id" style="width: 100%;" class="js-example-basic-single" id="cars">
                        <option value="{{ $rent->customer->id }}">{{ $rent->customer->name }}</option>
                    </select>
                </div>
                <br>
                <div class="col-sm-12" style="text-align: end;">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
                <div class="  form-group" style="text-align: end;">
                    <a href="{{ route('rents.index') }}" value="Back" class="btn btn-outline-dark btn-md">Back</a>
                </div>
            </form>
        </div>
    </div>
@section('adminlte_js')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endsection
@stop
