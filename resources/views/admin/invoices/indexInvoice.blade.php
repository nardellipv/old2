@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Recibos generados</h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>Recibo #</th>
                                <th>Fecha</th>
                                <th>Producto</th>
                                <th>Medio de Pago</th>
                                @if(empty(checkUserBranch()[1]))
                                <th>Sucursal</th>
                                @endif
                                <th>Barbero</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                                <th>Comisión</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoices as $invoice)
                            <tr>
                                <td><a href="{{ route('cash.receipt', $invoice->invoice) }}"> {{ $invoice->invoice }}</a></td>
                                <td>{{ \Carbon\Carbon::parse($invoice->created_at)->format('d/m/Y') }}</td>
                                <td>{{ $invoice->product->name }}</td>
                                <td>{{ $invoice->payment->name }}</td>
                                @if(empty(checkUserBranch()[1]))
                                <td>{{ $invoice->branch->name }}</td>
                                @endif
                                <td>{{ $invoice->employee->name }}</td>
                                <td>${{ $invoice->price }}</td>
                                <td>{{ $invoice->quantity }}</td>
                                <td>${{ $invoice->price * $invoice->quantity }}</td>
                                <td>${{ $invoice->commission_pay }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/js/jquery-datatable.js') }}"></script>
<script src="{{ asset('assets/bundles/datatablescripts.bundle.js') }}"></script>

<script src="{{ asset('assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.print.min.js') }}"></script>

@endsection