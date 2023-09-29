@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
@endsection

@section('content')
<div class="row clearfix">
    <div class="col-lg-12">
        @include('alerts.error')
        @include('admin.invoices._filter')
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
                                <td>
                                    @if (!empty($invoice->payment->name))
                                    {{ $invoice->payment->name }}
                                    @else
                                    -------
                                    @endif
                                </td>
                                @if(empty(checkUserBranch()[1]))
                                <td>{{ $invoice->branch->name }}</td>
                                @endif
                                <td>
                                    @if (!empty($invoice->employee->name))
                                    {{ $invoice->employee->name }}
                                    @else
                                    -------
                                    @endif
                                </td>
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

<script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
@endsection
