@extends('layouts.app')

@section('content')
<div class="row clearfix">
    <div class="col-md-12">
        @include('alerts.error')
        <div class="card">
            <div class="header">
                <h2>Agregar Nueva Sucursal</h2>
            </div>
            <div class="body">
                <form id="basic-form" method="post" action="{{ route('add.branch') }}">
                    @csrf
                    <div class="form-group">
                        <label>Nombre Sucursa</label>
                        <input type="text" class="form-control" name="name" placeholder="Sucursal Centro" required>
                    </div>
                    <div class="form-group">
                        <label>Email Sucursal</label>
                        <input type="text" class="form-control" name="email" placeholder="centro@oldbarberchair.com.ar">
                    </div>
                    <div class="form-group">
                        <label>Dirección</label>
                        <input type="text" class="form-control" name="address" placeholder="Calle San Martín 234" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
