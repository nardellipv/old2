@extends('layouts.app')

@section('content')
<div class="row clearfix">
    <div class="col-md-12">
        @include('alerts.error')
        <div class="card">
            <div class="header">
                <h2>Editar barbero <b>{{ $employee->name }}</b></h2>
            </div>
            <div class="body">
                <form id="basic-form" method="post" action="{{ route('upgrade.employee', $employee) }}">
                    @csrf
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" name="name" value="{{ $employee->name }}" placeholder="Nombre Barbero" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $employee->email }}" placeholder="centro@oldbarberchair.com.ar">
                    </div>
                    <div class="form-group">
                        <label>Dirección</label>
                        <input type="text" class="form-control" name="address" value="{{ $employee->address }}" placeholder="San Martín 567, ciudad" required>
                    </div>
                    <div class="form-group">
                        <label>Teléfono</label>
                        <input type="text" class="form-control" name="phone" value="{{ $employee->phone }}" placeholder="1233345" required>
                    </div>
                    <div class="form-group">
                        <label>Sucursal</label>
                        <select class="custom-select" id="inputGroupSelect04" name="branch_id">
                            <option value="{{ $employee->branch->id }}">{{ $employee->branch->name }}</option>
                            <option disabled>----------------------</option>
                            @foreach ($branches as $branch)
                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
