@extends('layouts.app')

@section('content')
<div class="row clearfix">
    <div class="col-md-12">
        @include('alerts.error')
        <div class="card">
            <div class="header">
                <h2>Agregar Nuevo Cliente</h2>
            </div>
            <div class="body">
                <form id="basic-form" method="post" action="{{ route('add.client') }}">
                    @csrf
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nombre Cliente" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="centro@ejemplo.com.ar">
                    </div>
                    <div class="form-group">
                        <label>Cumpleaños</label>
                        <input type="date" class="form-control" value="{{ old('birthday') }}" name="birthday">
                    </div>
                    <div class="form-group">
                        <label>Teléfono</label>
                        <input type="text" class="form-control" value="{{ old('phone') }}" name="phone" placeholder="23123434" required>
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
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
