@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Listado de clientes <a href="{{ route('addNew.client') }}" type="button" class="btn btn-secondary">Agregar Nuevo Cliente</a></h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                                @if(empty(checkUserBranch()[1]))
                                <th>Sucursal</th>
                                @endif
                                <th>Puntos</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                            <tr>
                                <td>{{ $client->name }}</td>
                                <td>{{ $client->email }}</td>
                                <td>{{ $client->phone }}</td>
                                @if(empty(checkUserBranch()[1]))
                                <td>{{ $client->branch->name }}</td>
                                @endif
                                <td>{{ $client->total_points }}</td>
                                <td>
                                    @if(!empty(checkUserBranch()[1]))
                                    <a href="{{ route('edit.client', $client) }}" type="button" class="btn btn-success" title="Save"><span class="sr-only">Editar</span> <i class="fa fa-edit"></i></a>
                                    <a href="{{ route('delete.client', $client) }}" type="button" class="btn btn-danger" title="Delete"><span class="sr-only">Borrar</span> <i class="fa fa-trash-o"></i></a>
                                    @else
                                    <a href="" type="button" class="btn btn-success disabled" title="Save"><span class="sr-only">Editar</span> <i class="fa fa-edit"></i></a>
                                    <a href="" type="button" class="btn btn-danger disabled" title="Delete"><span class="sr-only">Borrar</span> <i class="fa fa-trash-o"></i></a>
                                    @endif
                                </td>
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

@section('script')
<script src="{{ asset('assets/js/jquery-datatable.js') }}"></script>
<script src="{{ asset('assets/bundles/datatablescripts.bundle.js') }}"></script>
@endsection
