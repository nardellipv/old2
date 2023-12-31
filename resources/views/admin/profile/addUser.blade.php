@extends('layouts.app')

@section('css')
<style>
    [type=radio]#radioWithOutpoint {
        position: absolute;
        opacity: 0;
        width: 0;
        height: 0;
    }

    /* IMAGE STYLES */
    [type=radio]+img {
        cursor: pointer;
    }

    /* CHECKED STYLES */
    [type=radio]:checked+img {
        outline: 3px solid #0000ff;
    }

    .user-img-avatar {
        width: 52px;
        height: 52px;
        border-radius: 50%;
        border: 0 solid #e5e5e5;
        padding: 0;
        margin-left: 1rem;
    }
</style>
@endsection

@section('content')
<div class="row clearfix">
    @include('alerts.error')
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Perfil del nuevo usuario</h2>
            </div>

            <form id="basic-form" method="post" action="{{ route('user.new') }}">
                @csrf
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nombre y Apellido</label>
                                <input type="text" class="form-control" name="name" placeholder="Ingresar Nombre y Apellido" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Ingresar Email" required>
                            </div>
                            <div class="form-group">
                                <label>Teléfono</label>
                                <input type="text" class="form-control" name="phone" placeholder="Ingresar Teléfono" required>
                            </div>
                            <div class="form-group">
                                <label>Sucursal</label>
                                <select class="custom-select" id="inputGroupSelect04" name="branch_id">
                                    @foreach ($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Contraseña</label>
                                <input type="password" class="form-control" name="password" placeholder="Ingresar Contraseña" required>
                            </div>
                            <div class="form-group">
                                <label>Imagen de perfil</label><br>
                                <label class="fancy-radio">
                                    <input id="radioWithOutpoint" type="radio" name="image" value="avatar1">
                                    <img class="user-img-avatar" src="{{ asset('assets/images/xs/avatar1.jpg') }}" />
                                </label>
                                <label class="fancy-radio">
                                    <input id="radioWithOutpoint" type="radio" name="image" value="avatar2">
                                    <img class="user-img-avatar" src="{{ asset('assets/images/xs/avatar2.jpg') }}" />
                                </label>
                                <label class="fancy-radio">
                                    <input id="radioWithOutpoint" type="radio" name="image" value="avatar3">
                                    <img class="user-img-avatar" src="{{ asset('assets/images/xs/avatar3.jpg') }}" />
                                </label>
                                <label class="fancy-radio">
                                    <input id="radioWithOutpoint" type="radio" name="image" value="avatar4">
                                    <img class="user-img-avatar" src="{{ asset('assets/images/xs/avatar4.jpg') }}" />
                                </label>
                                <label class="fancy-radio">
                                    <input id="radioWithOutpoint" type="radio" name="image" value="avatar5">
                                    <img class="user-img-avatar" src="{{ asset('assets/images/xs/avatar5.jpg') }}" />
                                </label>
                                <label class="fancy-radio">
                                    <input id="radioWithOutpoint" type="radio" name="image" value="avatar6">
                                    <img class="user-img-avatar" src="{{ asset('assets/images/xs/avatar6.jpg') }}" />
                                </label>
                                <label class="fancy-radio">
                                    <input id="radioWithOutpoint" type="radio" name="image" value="avatar7">
                                    <img class="user-img-avatar" src="{{ asset('assets/images/xs/avatar7.jpg') }}" />
                                </label>
                                <label class="fancy-radio">
                                    <input id="radioWithOutpoint" type="radio" name="image" value="avatar8">
                                    <img class="user-img-avatar" src="{{ asset('assets/images/xs/avatar8.jpg') }}" />
                                </label>
                                <label class="fancy-radio">
                                    <input id="radioWithOutpoint" type="radio" name="image" value="avatar9">
                                    <img class="user-img-avatar" src="{{ asset('assets/images/xs/avatar9.jpg') }}" />
                                </label>
                                <label class="fancy-radio">
                                    <input id="radioWithOutpoint" type="radio" name="image" value="avatar10">
                                    <img class="user-img-avatar" src="{{ asset('assets/images/xs/avatar10.jpg') }}" />
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
            </form>
        </div>
    </div>

</div>
@endsection
