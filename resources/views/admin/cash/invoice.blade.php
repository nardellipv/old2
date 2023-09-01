@extends('layouts.app')

@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12">
        <div class="card invoice1">
            <div class="body">
                <div class="invoice-top clearfix">
                    <div class="info">
                        <h6>{{ $invoiceData->branch->name }}</h6>
                        <p>{{ $invoiceData->branch->email }}<br>
                            {{ $invoiceData->branch->address }}
                        </p>
                    </div>
                    <div class="title">
                        <p>Fecha Pago: {{ date('d/m/Y') }}</p>
                        <h5>Recibo #: {{ $invoiceData->invoice }}</h5>
                    </div>
                </div>
                <hr>
                <div class="invoice-mid clearfix">
                    <div class="info">
                        @if(!empty($invoiceData->client))
                        <h6>{{ $invoiceData->client->name }}</h6>
                        <p> {{ $invoiceData->client->email }} <br>
                            {{ $invoiceData->client->phone }}
                        </p>
                        @else
                        <p>Sin Cliente Registrado</p>
                        @endif
                    </div>

                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Descripción</th>
                                <th>Barbero</th>
                                <th>Monto</th>
                                <th>Cantidad</th>
                                <th style="width: 80px;">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($invoice as $key=>$data)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $data->product->name }}</td>
                                <td>{{ $data->employee->name }}</td>
                                <td>${{ $data->price }}</td>
                                <td>{{ $data->quantity }}</td>
                                <td>${{ $data->price * $data->quantity }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="row clearfix">
                    <div class="col-md-6">
                        <h5>Nota</h5>
                        <p>Recibo no valido como factura.</p>
                    </div>
                    <div class="col-md-6 text-right">
                        <h3 class="mb-0 m-t-10">${{ $totalSum }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
