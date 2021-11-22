@extends('adminlte::page')

@section('title', 'Editar empresas')

@section('content_header')
    <h1 class="m-0 text-dark"><strong>Edição dos dados empresariais:</strong></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <form action={{ route('companies.update', $company->id) }} method="post">
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Nome Social</label>
                                    <input type="text" value="{{ isset($company) ? $company->social_reason : null }}"
                                        name="social_reason" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Nome Fantasia</label>
                                    <input type="text" value="{{ isset($company) ? $company->fantasy_name : null }}"
                                        name="fantasy_name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">CNPJ</label>
                                    <input type="text" value="{{ isset($company) ? $company->cnpj : null }}" name="cnpj"
                                        class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Rua</label>
                                    <input type="text" value="{{ isset($company) ? $company->address : null }}"
                                        name="address" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Cidade/Estado</label>
                                    <input type="text" value="{{ isset($company) ? $company->district : null }}"
                                        name="district" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Número do Endereço</label>
                                    <input type="integer" value="{{ isset($company) ? $company->address_number : null }}"
                                        name="address_number" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Telefone</label>
                                    <input type="text" value="{{ isset($company) ? $company->phone : null }}" name="phone"
                                        class="form-control" required>
                                </div>

                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" value="{{ isset($company) ? $company->email : null }}" name="email"
                                        class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group" style="text-align: end;">>
                            <button type="submit" class="btn btn-success">Atualizar</button>
                        </div>

                        <div class="form-group" style="text-align: end;">
                            <a href="{{ route('companies.index') }}" value="Back"
                                class="btn btn-outline-dark btn-md">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
