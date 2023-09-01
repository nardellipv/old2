@extends('layouts.app')

@section('content')
<div class="row clearfix">
    <div class="card">
        <div class="header">
            <h2>Barbero <b>{{ $employee->name }}</b></h2>
        </div>

        <div class="body">
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Fecha</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Comisión</th>
                            <th>Cliente</th>
                            <th>Estado Comisión</th>
                            <th>Recibo #</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($historialWorks as $key=>$historial)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ \Carbon\Carbon::parse($historial->created_at)->format('d/m/Y') }}</td>
                            <td>{{ $historial->product->name }}</td>
                            <td>${{ $historial->price }}</td>
                            <td>${{ $historial->commission_pay }}</td>
                            <td>
                                @if(!empty($historial->client->name))
                                {{ $historial->client->name }}
                                @else
                                Sin Cliente
                                @endif
                            </td>
                            <td>
                                @if($historial->pending_pay == '0')
                                <span class="badge badge-default"><a href="{{ route('profile.employee', $employee) }}"> Pendiente de Pago</a></span>
                                @endif
                                @if($historial->pending_pay == '1')
                                <span class="badge badge-default"><a href="{{ route('pendingCancelWorks.employee', $employee) }}"> Recibo Generado</a></span>
                                @endif
                                @if($historial->pending_pay == '2')
                                <span class="badge badge-success">Comision Pagada</span>
                                @endif
                            </td>
                            <td><a href="{{ route('cash.receipt', $historial->invoice) }}"> {{ $historial->invoice }}</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {!! $historialWorks->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</div>
@endsection
