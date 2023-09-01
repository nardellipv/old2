@extends('layouts.app')

@section('content')
<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>Listado de barberos dado de baja</h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table center-aligned-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>Sucursal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employeeDown as $key=>$down)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td><a href="{{ route('profile.employee', $down) }}"> {{ $down->name }}</td>
                                <td>{{ Str::limit($down->email,25) }}</td>
                                <td>{{ Str::limit($down->address,25) }}</td>
                                <td>{{ $down->phone }}</td>
                                <td>{{ $down->branch->name }}</td>
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
