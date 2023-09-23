<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>Listado Productos / Venta Rápida</h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table mb-0 table-hover">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Medio de Pago</th>
                                <th>Elegir Barbero</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <form method="post" action="{{ route('sale.withOutClient') }}">
                                @csrf
                                <tr>
                                    <td>{{ $product->name }} - ${{ $product->price }}</td>
                                    <input value="{{ $product->id }}" name="product_id" hidden>
                                    <input value="{{ $product->price }}" name="price" hidden>
                                    <input value="{{ $product->commission }}" name="commission" hidden>
                                    <td>
                                        @if(!empty(checkUserBranch()[1]))
                                        <div class="input-group">
                                            <select class="custom-select" id="inputGroupSelect04" name="payment_id">
                                                <option value="">Elegir Medio de Pago</option>
                                                <option disabled>----------------</option>
                                                @foreach ($payments as $payment)
                                                <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </td>

                                    <td>
                                        <div class="input-group">
                                            <select class="custom-select" id="inputGroupSelect04" name="employee_id">
                                                <option value="">Elegir Barbero</option>
                                                <option disabled>----------------</option>
                                                @foreach ($employees as $employee)
                                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    <td>
                                        <button type="submit" class="btn btn-success" title="Save"><span class="sr-only">Save</span> <i class="fa fa-credit-card"></i></button>
                                    </td>
                                    @else
                                    <div class="input-group">
                                        <select class="custom-select" id="inputGroupSelect04" name="payment_id" disabled>
                                            <option value="">Elegir Medio de Pago</option>
                                        </select>
                                    </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <select class="custom-select" id="inputGroupSelect04" name="employee_id" disabled>
                                                <option value="">Elegir Barbero</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-success" disabled title="Save"><span class="sr-only">Vender</span> <i class="fa fa-credit-card"></i></button>
                                    </td>
                                    @endif
                                </tr>
                            </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="col-md-6">
            <div class="card">
                <div class="header">
                    <h2>Ventas Mensuales <small>Sucursal
                            @if(!empty(checkUserBranch()[1]))
                            <b>{{ checkUserBranch()['1']->name }}</b>
                            @else
                            <b>Todas las sucursales</b>
                            @endif
                        </small></h2>
                </div>
                <div class="body">
                    <div id="container"></div>
                </div>
            </div>
        </div> -->
</div>
