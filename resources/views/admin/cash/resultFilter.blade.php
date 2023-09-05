@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Movimientos Diarios</h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Fecha</th>
                                <th>Monto</th>
                                <th>Motivo</th>
                                <th>Medio de Pago</th>
                                <th>Recibo #</th>
                                <th>Movimiento</th>
                                @if(empty(checkUserBranch()[1]))
                                <th>Sucursal</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($search as $key=>$move)
                            <tr class="{{ $move->move == 'E' ? 'l-blush' : '' }}">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ \Carbon\Carbon::parse($move->created_at)->format('d/m/Y') }}</td>
                                <td>${{ $move->mount }}</td>
                                <td>{{ Str::limit($move->comment,50) }}</td>
                                <td>
                                    @if (!empty($move->payment->name))
                                    {{ $move->payment->name }}
                                    @else
                                    -----------
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($move->invoice_id))
                                    <a href="{{ route('cash.receipt', $move->invoice_id) }}"> {{ $move->invoice_id }}</a>
                                    @else
                                    ------
                                    @endif
                                </td>
                                <td>
                                    @if($move->move == 'I')
                                    Ingreso de dinero
                                    @else
                                    Egreso de dinero
                                    @endif
                                </td>
                                @if(empty(checkUserBranch()[1]))
                                <td>{{ $move->branch->name }}</td>
                                @endif
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
