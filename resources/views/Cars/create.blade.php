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
            <form action={{ route('cars.store') }} name="myForm" method="post" enctype="multipart/form-data"
                onclick="validateFormInput()" id="formStore">
                @csrf
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Modelo</label>
                            <input type="text" value="{{ isset($car) ? $car->name : null }}" class="form-control"
                                name="name" required>
                            <div class="invalid-feedback">
                            </div>
                            <div class="valid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Marca</label>
                            <input type="text" value="{{ isset($car) ? $car->brand : null }}" class="form-control"
                                name="brand" required>
                            <div class="invalid-feedback">
                            </div>
                            <div class="valid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Cor</label>
                            <input type="text" value="{{ isset($car) ? $car->color : null }}" class="form-control"
                                name="color" required>
                            <div class="invalid-feedback">
                            </div>
                            <div class="valid-feedback">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Placa</label>
                            <input type="text" value="{{ isset($car) ? $car->board : null }}" class="form-control"
                                name="board" required>
                            <div class="invalid-feedback">
                            </div>
                            <div class="valid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Ano</label>
                            <input type="text" value="{{ isset($car) ? $car->year : null }}" class="form-control"
                                name="year" required>
                            <div class="invalid-feedback">
                            </div>
                            <div class="valid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Quilometragem</label>
                            <input type="text" value="{{ isset($car) ? $car->km : null }}" class="form-control"
                                name="km" required>
                            <div class="invalid-feedback">
                            </div>
                            <div class="valid-feedback">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Valor</label>
                            <input type="text" value="{{ isset($car) ? $car->value : null }}" class="form-control"
                                name="value" required>
                            <div class="invalid-feedback">
                            </div>
                            <div class="valid-feedback">
                            </div>
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
                            <div class="invalid-feedback">
                            </div>
                            <div class="valid-feedback">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <label for="">Situação do Carro</label>
                        <input type="text" value="{{ isset($car) ? $car->car_situation : null }}" class="form-control"
                            name="car_situation" required>
                        <div class="invalid-feedback">
                        </div>
                        <div class="valid-feedback">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label for="">Tipo de Combustível</label>
                        <input type="text" value="{{ isset($car) ? $car->fuel : null }}" class="form-control"
                            name="fuel" required>
                        <div class="invalid-feedback">
                        </div>
                        <div class="valid-feedback">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label for="">Fotos do Carro</label>
                        <input required type="file" class="form-control" name="images[]" placeholder="imagens" multiple>
                    </div>
                </div>
                <br>
                <div class="form-group" style="text-align: end;">
                    <button type="submit" class="btn btn-outline-primary btn-md"
                        onsubmit="validateFormInput()">Cadastrar</button>
                    <a href="{{ route('cars.index') }}" value="Voltar" class="btn btn-outline-dark btn-md">Voltar</a>
                </div>
            </form>
        </div>
    </div>

    {{-- JavaScript --}}
    <script>
        function validateFormInput() {
            $('#formStore :input').each((key, element) => {
                if ($(element).prop('required') && $(element).val() == '') {
                    $(element).addClass('is-invalid')
                    $('.invalid-feedback').text('Campo obrigatório')
                }
            });
            $('#formStore :input').on('keyup', function(e) {
                $(this).removeClass('is-invalid').addClass('is-valid');
                console.log($(this).closet('.form-group .valid-feedback'))
                $(this).closet('.form-group .valid-feedback').text('Campo válido')
            });

            let input = document.forms["myForm"]["name"].value;

        }
    </script>
@stop
