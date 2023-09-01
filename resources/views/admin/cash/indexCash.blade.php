@extends('layouts.app')

@section('content')
<div class="row clearfix">
    @include('alerts.error')
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="header">
                <h2> Caja Sucursal
                    @if(!empty(checkUserBranch()[1]))
                    <b>{{ checkUserBranch()[1]->name }}</b>
                    @else
                    <b>Todas las sucursales</b>
                    @endif
                </h2>
            </div>
            <form id="basic-form" method="post" action="{{ route('cash.move') }}">
                @csrf
                <div class="body">
                    <div class="form-group">
                        <label class="fancy-radio"><input name="move" value="I" type="radio"><span><i></i>Ingreso Dinero</span></label>
                        <label class="fancy-radio"><input name="move" value="E" type="radio"><span><i></i>Egreso Dinero</span></label>
                    </div>

                    <div class="form-group">
                        <label>Monto</label>
                        <input type="text" class="form-control" name="mount" placeholder="Ingresar Monto">
                    </div>

                    <div class="form-group">
                        @foreach ($payments as $payment)
                        <label class="fancy-radio"><input name="payment_id" value="{{ $payment->id }}" type="radio"><span><i></i>{{ $payment->name }}</span></label>
                        @endforeach
                    </div>

                    <div class="form-group">
                        <label>Ingresar Motivo de movimiento</label>
                        <textarea class="form-control" name="comment" placeholder="Motivo"></textarea>
                    </div>
                    @if(checkUserBranch()[1])
                    <button type="submit" class="btn btn-secondary">Realizar el Movimiento</button>
                    @else
                    <button type="submit" class="btn btn-secondary disabled">Realizar el Movimiento</button>
                    @endif
                </div>
            </form>
        </div>
    </div>

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
                            @foreach ($cashMove as $key=>$move)
                            <tr class="{{ $move->move == 'E' ? 'l-blush' : '' }}">
                                <td>{{ $key + 1 }}</td>
                                <td>${{ $move->mount }}</td>
                                <td>{{ $move->comment }}</td>
                                <td>{{ $move->payment->name }}</td>
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
                {!! $cashMove->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>
</div>
@endsection
