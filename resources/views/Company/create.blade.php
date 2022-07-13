@extends('adminlte::page')

@section('title', 'Home Page')

@section('content_header')
    <h1 class="m-0 text-dark text-center"><strong>Cadastrar Empresa</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form name="myForm" action={{ route('companies.store') }} method="post" onsubmit="return validateFormInput()"
                id="formStore">
                @csrf
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group has-validation">
                            <label for="">Nome Social</label>
                            <input type="text" value="{{ isset($company) ? $company->social_reason : null }}"
                                name="social_reason" class="form-control" required>
                            <div class="invalid-feedback">
                            </div>
                            <div class="valid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Nome Fantasia</label>
                            <input type="text" value="{{ isset($company) ? $company->fantasy_name : null }}"
                                name="fantasy_name" class="form-control" required>
                            <div class="invalid-feedback">
                            </div>
                            <div class="valid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">CNPJ</label>
                            <input type="text" value="{{ isset($company) ? $company->cnpj : null }}" name="cnpj"
                                class="form-control" required>
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
                            <label for="">Rua</label>
                            <input type="text" value="{{ isset($company) ? $company->address : null }}" name="address"
                                class="form-control" required>
                            <div class="invalid-feedback">
                            </div>
                            <div class="valid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Cidade/Estado</label>
                            <input type="text" value="{{ isset($company) ? $company->district : null }}" name="district"
                                class="form-control" required>
                            <div class="invalid-feedback">
                            </div>
                            <div class="valid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Número do Endereço</label>
                            <input type="integer" value="{{ isset($company) ? $company->address_number : null }}"
                                name="address_number" class="form-control" required>
                            <div class="invalid-feedback">
                            </div>
                            <div class="valid-feedback">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">

                        <div class="form-group">
                            <label for="">Telefone</label>
                            <input type="text" value="{{ isset($company) ? $company->phone : null }}" name="phone"
                                class="form-control" required>
                            <div class="invalid-feedback">
                            </div>
                            <div class="valid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" value="{{ isset($company) ? $company->email : null }}" name="email"
                                class="form-control" required>
                            <div class="invalid-feedback">
                            </div>
                            <div class="valid-feedback">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group" style="text-align: end;">
                    <button type="submit" class="btn btn-outline-primary btn-md"
                        onclick="return validateFormInput()">Cadastrar</button>
                    <a href="{{ route('companies.index') }}" value="Voltar" class="btn btn-outline-dark btn-md">Voltar</a>
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
                } else {
                    $(element).removeClass('is-invalid')
                    $(element).addClass('is-valid')
                    $('.valid-feedback').text('Campo preenchido')
                }
            });

            let input = document.forms["myForm"]["social_reason"].value;

        }
    </script>
@stop
