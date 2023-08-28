@extends('layouts.app')

@section('css')
<script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
<script src="https://cdn.anychart.com/releases/8.11.1/js/anychart-calendar.min.js"></script>

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
                <small class="text-muted">Dirección: </small>
                <p class="mb-0">{{ $employee->address }}</p>
            </div>
        </div>
    </div>

    <div class="col-lg-8 col-md-12">
        <div class="card">
            <div class="header">
                <h2>Detalle Trabajos Mensual</h2>
                <ul class="header-dropdown">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another Action</a></li>
                            <li><a href="javascript:void(0);">Something else</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Cortes</th>
                            <th>Cantidad</th>
                            <th>Monto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detailWorks as $detail)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($detail->created_at)->format('d/m/Y') }}</td>
                            <td>{{ $detail->product->name }} - Cant: {{ $detail->count }}</td>
                            <td>{{ $detail->count }}</td>
                            <td>${{ $detail->price }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="header">
        <div id="container"></div>
    </div>
</div>

@endsection

@section('script')
<script>
    anychart.onDocumentReady(function() {

        // set the data
        var data = {
            header: ['Name', 'Cantidad'],
            rows: [
                // ['San-Francisco (1906)', 1500],
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
