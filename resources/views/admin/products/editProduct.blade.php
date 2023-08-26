@extends('layouts.app')

@section('content')
<div class="row clearfix">
    <div class="col-md-12">
        @include('alerts.error')
        <div class="card">
            <div class="header">
                <h2>Agregar Nuevo Producto</h2>
            </div>
            <div class="body">
                <form id="basic-form" method="post" action="{{ route('upgrade.product', $product) }}">
                    @csrf
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" name="name" value="{{ $product->name, old('name') }}" placeholder="Nombre del Producto" required>
                    </div>
                    <div class="form-group">
                        <label>Precio</label>
                        <input type="text" class="form-control" name="price" value="{{ $product->price, old('price') }}" placeholder="Precio del Producto" required>
                    </div>
                    <div class="form-group">
                        <label>Oferta</label>
                        <input type="text" class="form-control" name="offer" value="{{ $product->offer, old('offer') }}" placeholder="Precio oferta del Producto" required>
                    </div>
                    <div class="form-group">
                        <label>Puntos</label>
                        <input type="text" class="form-control" name="point" value="{{ $product->point, old('point') }}" placeholder="Puntos del Producto" required>
                    </div>
                    <div class="form-group">
                        <label>Puntos para cambiar</label>
                        <input type="text" class="form-control" name="point_changed" value="{{ $product->point_changed, old('point_changed') }}" placeholder="Puntos requeridos para cambiar" required>
                    </div>

                    <div class="form-group">
                        <label>Sucursal</label>
                        <select class="custom-select" id="inputGroupSelect04" name="branch_id">
                            <option value="{{ $product->branch->id }}">{{ $product->branch->name }}</option>
                            @foreach ($branches as $branch)
                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label>Publicar</label>
                                <label class="fancy-radio"><input name="show" value="Y" type="radio" {{ $product->show =='Y' ? 'checked' : '' }}><span><i></i>Si</span></label>
                                <label class="fancy-radio"><input name="show" value="N" type="radio" {{ $product->show =='N' ? 'checked' : '' }}><span><i></i>No</span></label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label>Producto canjeable</label>
                                <label class="fancy-radio"><input name="exchange" value="Y" type="radio" {{ $product->exchange =='Y' ? 'checked' : '' }}><span><i></i>Si</span></label>
                                <label class="fancy-radio"><input name="exchange" value="N" type="radio" {{ $product->exchange =='N' ? 'checked' : '' }}><span><i></i>No</span></label>
                            </div>
                        </div>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
