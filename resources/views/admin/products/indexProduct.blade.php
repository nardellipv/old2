@extends('layouts.app')

@section('content')
<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>Listado de Sucursales <a href="{{ route('addNew.product') }}" type="button" class="btn btn-secondary">Agregar Nuevo Producto</a></h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table center-aligned-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Oferta</th>
                                <th>Puntos</th>
                                <th>Puntos canjar</th>
                                <th>Comisiona</th>
                                <th>Canje</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key=>$product)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $product->name }}</td>
                                <td>${{ $product->price }}</td>
                                @if ($product->offer)
                                <td>${{ $product->offer }}</td>
                                @else
                                <td><span class="text-danger"><b>Sin Oferta</b></span></td>
                                @endif
                                <td>{{ $product->point }}</td>
                                <td>{{ $product->point_changed }}</td>
                                <td>{{ $product->commission }}</td>
                                <td>
                                    @if($product->exchange == 'Y')
                                    <a href="{{ route('activeExchange.product', $product) }}">
                                        <i class="fa fa-check fa-2x" style="color:blue"></i>
                                    </a>
                                    @else
                                    <a href="{{ route('desactiveExchange.product', $product) }}">
                                        <i class="fa fa-times fa-2x" style="color:red"></i>
                                    </a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('edit.product', $product) }}" type="button" class="btn btn-success" title="editar"><span class="sr-only">Editar</span> <i class="fa fa-edit"></i></a>
                                    <a href="{{ route('delete.product', $product) }}" type="button" class="btn btn-danger" title="borrar"><span class="sr-only">Borrar</span> <i class="fa fa-trash-o"></i></a>
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
