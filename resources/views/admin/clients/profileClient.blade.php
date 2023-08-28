@extends('layouts.app')

@section('css')
<script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>

<style>
    #container {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
    }
</style>
@endsection

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

<div id="container"></div>
@endsection

@section('script')
<script>
    anychart.onDocumentReady(function() {

        // set the data
        var data = {
            header: ['Name', 'Cantidad'],
            rows: [
                // ['San-Francisco (1906)', 1500],
                @foreach ($clientCount as $countClient)
                ['{{ \Carbon\Carbon::parse($countClient->created_at)->format('d/m/Y') }}' ,{{ $countClient->count }}],
                @endforeach
            ]
        };

        // create the chart
        var chart = anychart.column();

        // add data
        chart.data(data);

        // set the chart title
        chart.title('Progreso de {{ $client->name }}');

        // draw
        chart.container('container');
        chart.draw();
    });
</script>
@endsection
