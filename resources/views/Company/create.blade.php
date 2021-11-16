@extends('adminlte::page')

@section('title', 'Home Page')

@section('content_header')
    <h1 class="m-0 text-dark">Gerenciamento de empresas:</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action={{ route('companies.store') }} method="post">
                @csrf
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
                            <input type="text" value="{{ isset($company) ? $company->address : null }}" name="address"
                                class="form-control" required>
                        </div>

                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Cidade/Estado</label>
                            <input type="text" value="{{ isset($company) ? $company->district : null }}" name="district"
                                class="form-control" required>
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
                    <div class="col-sm-6">

                        <div class="form-group">
                            <label for="">Telefone</label>
                            <input type="text" value="{{ isset($company) ? $company->phone : null }}" name="phone"
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-6">

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" value="{{ isset($company) ? $company->email : null }}" name="email"
                                class="form-control" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </form>

        </div>
    </div>
@stop
