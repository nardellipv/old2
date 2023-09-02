@extends('layouts.app')

@section('css')
<script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>

<link rel="stylesheet" href="{{ asset('assets/css/chart.css') }}">
@endsection

@section('content')
<div class="row clearfix">
    @include('alerts.error')
    <div class="col-lg-5 col-md-12">
        <div class="card profile-header">
            <div class="body">
                <div>
                    <h4 class="mb-0"><strong>{{ $employee->name }}</strong></h4>
                    <span>Sucursal: <b>{{ $employee->branch->name }}</b></span>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="header">
                <h2>Información Básica</h2>
            </div>
            <div class="body">
                <small class="text-muted">Nombre: </small>
                <p>{{ $employee->name }}</p>
                <hr>
                <small class="text-muted">Email: </small>
                <p>{{ $employee->email }}</p>
                <hr>
                <small class="text-muted">Teléfono: </small>
                <p>{{ $employee->phone }}</p>
                <hr>
                <small class="text-muted">Comisión Venta: </small>
                <p>{{ $employee->commission }}%</p>
                <hr>
                <small class="text-muted">Dirección: </small>
                <p class="mb-0">{{ $employee->address }}</p>
            </div>
        </div>
    </div>

    <div class="col-lg-7 col-md-12">
        <div class="card">
            <div class="header">
                <h2>Trabajos realizados del día</h2>
            </div>
            <div class="body">
                <div class="new_timeline">
                    <div class="header">
                        <div class="color-overlay">
                            <div class="day-number">{{ date('d') }}</div>
                            <div class="date-right">
                                <div class="day-name">{{ date('M') }}</div>
                            </div>
                        </div>
                    </div>
                    <ul>
                        @foreach ($timeLineWork as $detailTimeLine)
                        <li>
                            <div class="bullet pink"></div>
                            <div class="time">{{ \Carbon\Carbon::parse($detailTimeLine->created_at)->format('H:m') }}</div>
                            <div class="desc">
                                <h3>{{ $detailTimeLine->product->name }}</h3>
                                <h4>
                                @if(!empty($detailTimeLine->client->name))
                                {{ $detailTimeLine->client->name }}
                                @else
                                Sin Cliente
                                @endif
                            </h4>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>Pendientes de cancelar <a href="{{ route('historialWorks.employee', $employee) }}" type="button" class="btn btn-warning">Historial de Trabajo</a></h2>
            </div>
            <div class="body">
                <form id="basic-form" method="post" action="{{ route('pendingWorks.employee', $employee) }}">
                    @csrf
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 c_list">
                            <thead>
                                <tr>
                                    <th>
                                        <label class="fancy-checkbox">
                                            <input class="select-all" type="checkbox" name="checkbox">
                                            <span></span>
                                        </label>
                                    </th>
                                    <th>Fecha</th>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Comisión</th>
                                    <th>Cliente</th>
                                    <th>Recibo #</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pendingWorks as $pending)
                                <tr>
                                    <td style="width: 50px;">
                                        <label class="fancy-checkbox">
                                            <input class="checkbox-tick" type="checkbox" name="sale[{{$pending->id}}]">
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($pending->created_at)->format('d/m/Y') }}</td>
                                    <td>{{ $pending->product->name }}</td>
                                    <td>${{ $pending->price }}</td>
                                    <td>${{ $pending->commission_pay }}</td>
                                    <td>
                                        @if(!empty($pending->client->name))
                                        {{ $pending->client->name }}
                                        @else
                                        Sin Cliente
                                        @endif
                                    </td>
                                    <td><a href="{{ route('cash.receipt', $pending->invoice) }}"> {{ $pending->invoice }}</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <button class="btn btn-secondary" type="submit">Pagar comisiones</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="header">
        <div id="container"></div>
    </div>
</div>

@if($employee->status == 1)
<a href="{{ route('down.employee', $employee) }}" type="button" class="btn btn-danger">Dar de baja a {{ $employee->name }}</a>
@else
<a href="{{ route('up.employee', $employee) }}" type="button" class="btn btn-warning">Reactivar a {{ $employee->name }}</a>
@endif

@endsection

@section('script')
<script>
    anychart.onDocumentReady(function() {

        // set the data
        var data = {
            header: ['Name', 'Cantidad'],
            rows: [
                @foreach ($detailWorks as $detailCount)
                ['{{ \Carbon\Carbon::parse($detailCount->created_at)->format('d/m/Y') }}', {{ $detailCount->count }}],
                @endforeach
            ]
        };

        // create the chart
        var chart = anychart.column();

        // add data
        chart.data(data);

        // set the chart title
        chart.title('Progreso Mes de {{ $employee->name }}');

        // draw
        chart.container('container');
        chart.draw();
    });
</script>
@endsection
