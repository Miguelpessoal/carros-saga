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
                            <input type="checkbox" class="form-control" name="finished" id="checkbox">
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
                    <a href="{{ route('rents.index') }}" value="Voltar" class="btn btn-outline-dark btn-md">Voltar</a>
                </div>
            </form>
        </div>
    </div>

    {{-- JavaScript --}}

@section('adminlte_js')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endsection

<script>
    const rent = @json($rent)
</script>
<script>
    const checkBoxElement = document.querySelectorAll("#checkbox")[0]

    rent.finished ? checkBoxElement.checked = true : ''
</script>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
</script>
@stop
