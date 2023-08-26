@extends('layouts.app')

@section('content')
<div class="row clearfix">
    <div class="col-md-12">
        @include('alerts.error')
        <div class="card">
            <div class="header">
                <h2>Editar Cliente <b>{{ $client->name }}</b></h2>
            </div>
            <div class="body">
                <form id="basic-form" method="post" action="{{ route('upgrade.client', $client) }}">
                    @csrf
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" name="name" value="{{ $client->name, old('name') }}" placeholder="Nombre Cliente" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $client->email, old('email') }}" placeholder="centro@ejemplo.com.ar">
                    </div>
                    <div class="form-group">
                        <label>Cumpleaños</label>
                        <input type="date" class="form-control" value="{{ $client->birthday, old('birthday') }}" name="birthday">
                    </div>
                    <div class="form-group">
                        <label>Teléfono</label>
                        <input type="text" class="form-control" value="{{ $client->phone, old('phone') }}" name="phone" placeholder="23123434" required>
                    </div>
                    <div class="form-group">
                        <label>Sucursal</label>
                        <select class="custom-select" id="inputGroupSelect04" name="branch_id">
                            <option value="{{ $client->branch->id }}">{{ $client->branch->name }}</option>
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
