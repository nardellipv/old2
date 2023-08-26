<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Listado de clientes</h2>
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                            <tr>
                                <td><a href="{{ route('profile.client', $client) }}"> {{ $client->name }}</a></td>
                                <td>{{ $client->email }}</td>
                                <td>{{ $client->phone }}</td>
                                @if(empty(checkUserBranch()[1]))
                                <td>{{ $client->branch->name }}</td>
                                @endif
                                <td>{{ $client->total_points }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
