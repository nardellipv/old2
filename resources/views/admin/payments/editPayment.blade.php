@extends('layouts.app')

@section('content')
<div class="row clearfix">
    <div class="col-md-12">
        @include('alerts.error')
        <div class="card">
            <div class="header">
                <h2>Editar Medio de Pago <b>{{ $payment->name }}</b></h2>
            </div>
            <div class="body">
                <form id="basic-form" method="post" action="{{ route('upgrade.payment', $payment) }}">
                    @csrf
                    <div class="form-group">
                        <label>Nombre Medio de Pago</label>
                        <input type="text" class="form-control" name="payment" value="{{ $payment->name }}" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
