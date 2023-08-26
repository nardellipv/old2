@extends('layouts.app')

@section('content')
<div class="row clearfix">
    @include('alerts.error')
    <div class="col-lg-4 col-md-12">
        <div class="card profile-header">
            <div class="body">
                <div>
                    <h4 class="mb-0"><strong>{{ $client->name }}</strong></h4>
                    <span>Sucursal: <b>{{ $client->branch->name }}</b></span>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="header">
                <h2>Información Básica</h2>
            </div>
            <div class="body">
                <small class="text-muted">Nombre: </small>
                <p>{{ $client->name }}</p>
                <hr>
                <small class="text-muted">Email: </small>
                <p>{{ $client->email }}</p>
                <hr>
                <small class="text-muted">Teléfono: </small>
                <p>{{ $client->phone }}</p>
                <hr>
                <small class="text-muted">Cumpleaños: </small>
                <p class="mb-0">{{ \Carbon\Carbon::parse($client->birthday)->format('d/m/Y') }}</p>
            </div>
        </div>
    </div>

    <div class="col-lg-7 col-md-12">
        <form id="basic-form" method="post" action="{{ route('sale.client', $client) }}">
            @csrf
            <div class="card profile-header">
                <div class="body">
                    <div>
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <select class="custom-select" id="inputGroupSelect04" name="payment_id">
                                        <option value="">Elegir Medio de Pago</option>
                                        <option disabled>----------------</option>
                                        @foreach ($payments as $payment)
                                        <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <select class="custom-select" id="inputGroupSelect04" name="employee_id">
                                        <option value="">Elegir Barbero</option>
                                        <option disabled>----------------</option>
                                        @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 c_list">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>
                                        <p class="c_name">{{ $product->name }} - ${{ $product->price }}</p>
                                    </td>
                                    <td style="width: 35%;">
                                        <input type="text" name="quantity[{{ $product->id }}]" class="form-control" value="0" required>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        <button type="submit" class="btn btn-primary">Vender</button>
                        <a href="{{ route('dashboard') }}" type="button" class="btn btn-warning">Volver</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
