@extends('layouts.app')

@section('content')
<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>Listado de Sucursales <a href="{{ route('addNew.branch') }}" type="button" class="btn btn-secondary">Agregar Nueva Sucursal</a></h2>
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
                                <th><a href="{{ route('active.branch', $id=0) }}" class="btn btn-success btn-sm">Activar Todas</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($branches as $key=>$branch)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $branch->name }}</td>
                                <td>{{ Str::limit($branch->email,25) }}</td>
                                <td>{{ Str::limit($branch->address,25) }}</td>
                                <td><a href="{{ route('active.branch', $branch) }}" class="btn btn-success btn-sm">Activar</a></td>
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
