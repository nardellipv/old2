@extends('layouts.app')

@section('content')
<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>Listado de barberos <a href="{{ route('addNew.employee') }}" type="button" class="btn btn-secondary">Agregar Nuevo Barbero</a></h2>
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
                                <th>Comisión</th>
                                @if(empty(checkUserBranch()[1]))
                                <th>Sucursal</th>
                                @endif
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $key=>$employee)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $employee->name }}</td>
                                <td>{{ Str::limit($employee->email,25) }}</td>
                                <td>{{ Str::limit($employee->address,25) }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>{{ $employee->commission }}</td>
                                @if(empty(checkUserBranch()[1]))
                                <td>{{ $employee->branch->name }}</td>
                                @endif
                                <td>
                                    <a href="{{ route('profile.employee', $employee) }}" type="button" class="btn btn-success" title="Save"><span class="sr-only">Ver Perfil</span> <i class="fa fa-eye"></i></a>
                                    @if(!empty(checkUserBranch()[1]))
                                    <a href="{{ route('edit.employee', $employee) }}" type="button" class="btn btn-success" title="Editar"><span class="sr-only">Editar</span> <i class="fa fa-edit"></i></a>
                                    <a href="{{ route('down.employee', $employee) }}" type="button" class="btn btn-danger" title="Borrar"><span class="sr-only">Borrar</span> <i class="fa fa-trash-o"></i></a>
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
