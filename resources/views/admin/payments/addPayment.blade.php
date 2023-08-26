@extends('layouts.app')

@section('content')
<div class="row clearfix">
    <div class="col-md-12">
        @include('alerts.error')
        <div class="card">
            <div class="header">
                <h2>Agregar Medio de Pago</h2>
            </div>
            <div class="body">
                <form id="basic-form" method="post" action="{{ route('add.payment') }}">
                    @csrf
                    <div class="form-group">
                        <label>Nombre Medio de Pago</label>
                        <input type="text" class="form-control" value="{{ old('name') }}" name="name" placeholder="Visa" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
