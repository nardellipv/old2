@extends('layouts.app')

@section('content')
<div class="row clearfix">
    <div class="col-md-12">
        @include('alerts.error')
        <div class="card">
            <div class="header">
                <h2>Agregar Nuevo Barbero</h2>
            </div>
            <div class="body">
                <form id="basic-form" method="post" action="{{ route('add.employee') }}">
                    @csrf
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" name="name" placeholder="Nombre Barbero" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="centro@oldbarberchair.com.ar">
                    </div>
                    <div class="form-group">
                        <label>Dirección</label>
                        <input type="text" class="form-control" name="address" placeholder="San Martín 567, ciudad" required>
                    </div>
                    <div class="form-group">
                        <label>Teléfono</label>
                        <input type="text" class="form-control" name="phone" placeholder="1233345" required>
                    </div>
                    <div class="form-group">
                        <label>Sucursal</label>
                        <select class="custom-select" id="inputGroupSelect04" name="branch_id">
                            @foreach ($branches as $branch)
                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Agregarco</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
