@extends('adminlte::page')

@section('title', 'Clientes Home Page')

@section('content_header')
    <h1 class="m-0 text-dark text-center"><strong>Cadastrar Cliente</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action={{ route('customers.store') }} method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Nome</label>
                            <input type="text" value="{{ isset($customer) ? $customer->name : null }}" name="name"
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label for="">Tipo de Pessoa</label>
                        <select class="form-control" id="typePerson">
                            <option value="0" selected>Pessoa Física</option>
                            <option value="1">Pessoa Jurídica</option>
                        </select>
                    </div>
                    <div class="col-sm-4" id="div_cpf">
                        <div class="form-group">
                            <label for="">CPF</label>
                            <input type="text" value="{{ isset($customer) ? $customer->cpf : null }}" name="cpf" id="cpf"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4" id="div_cnpj" hidden>
                        <div class="form-group">
                            <label for="">CNPJ</label>
                            <input type="text" value="{{ isset($customer) ? $customer->cnpj : null }}" name="cnpj"
                                id="cnpj" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Rua</label>
                            <input type="text" value="{{ isset($customer) ? $customer->address : null }}" name="address"
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Cidade/Estado</label>
                            <input type="text" value="{{ isset($customer) ? $customer->district : null }}" name="district"
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Número do Endereço</label>
                            <input type="integer" value="{{ isset($customer) ? $customer->address_number : null }}"
                                name="address_number" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">

                        <div class="form-group">
                            <label for="">Telefone</label>
                            <input type="text" value="{{ isset($customer) ? $customer->phone : null }}" name="phone"
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" value="{{ isset($customer) ? $customer->email : null }}" name="email"
                                class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="form-group" style="text-align: end;">
                    <button type="submit" class="btn btn-outline-primary btn-md">Cadastrar</button>
                    <a href="{{ route('customers.index') }}" value="Voltar" class="btn btn-outline-dark btn-md">Voltar</a>
                </div>
            </form>
        </div>
    </div>
@section('js')
    {{-- JavaScript --}}
    <script>
        $(document).ready(function() {
            $('#typePerson').change(function() {
                if ($(this).val() == 1) {
                    $('#div_cnpj').attr('hidden', false);
                    $('#div_cpf').attr('hidden', true);
                } else {
                    $('#div_cpf').attr('hidden', false);
                    $('#div_cnpj').attr('hidden', true);
                }
            });
        });
    </script>
@endsection
@stop
