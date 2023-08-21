@extends('layouts.app')

@section('content')
<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>Listado de Medios de Pago <a href="{{ route('addNew.payment') }}" type="button" class="btn btn-secondary">Agregar Medio de Pago</a></h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table center-aligned-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $key=>$payment)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $payment->name }}</td>
                                <td>
                                    <a href="{{ route('edit.payment', $payment) }}" type="button" class="btn btn-success" title="Save"><span class="sr-only">Editar</span> <i class="fa fa-edit"></i></a>
                                    <a href="{{ route('delete.payment', $payment) }}" type="button" class="btn btn-danger" title="Delete"><span class="sr-only">Borrar</span> <i class="fa fa-trash-o"></i></a>
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
