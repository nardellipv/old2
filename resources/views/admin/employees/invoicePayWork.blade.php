@extends('layouts.app')

@section('content')
<div class="row clearfix">

    <div class="col-lg-12 col-md-12">
        <div class="card invoice1">
            <div class="body">
                <div class="invoice-top clearfix">
                    <div class="info">
                        <h6>{{ checkUserBranch()[1]->name }}</h6>
                        <p>{{ checkUserBranch()[1]->email }}<br>
                            {{ checkUserBranch()[1]->address }}
                        </p>
                    </div>
                    <div class="title">
                        <p>Fecha Pago: {{ date('d/m/Y') }}</p>
                    </div>
                </div>
                <hr>
                <div class="invoice-mid clearfix">
                    <div class="info">
                        <h6>{{ $employee->name }}</h6>
                        <p> {{ $employee->email }} <br>
                            {{ $employee->phone }}
                        </p>
                    </div>

                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Descripción</th>
                                <th>Cantidad</th>
                                <th>Monto</th>
                                <th style="width: 80px;">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($choosePay as $key=>$pay)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $pay->product->name }}</td>
                                <td>{{ $pay->quantity }}</td>
                                <td>${{ $pay->commission_pay / $pay->quantity }}</td>
                                <td>${{ $pay->commission_pay }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="row clearfix">
                    <div class="col-md-6">
                        <h5>Nota</h5>
                        <p>Recibo no valido como factura.</p>
                    </div>
                    <div class="col-md-6 text-right">
                        <h3 class="mb-0 m-t-10">$ {{ $sumTotal }}</h3>
                    </div>
                    <div class="hidden-print col-md-12 text-right">
                        <hr>
                        <button class="btn btn-outline-secondary"><i class="fa fa-print"></i></button>
                        <a href="{{ route('cancelWorks.employee', $employee) }}" class="btn btn-warning"><i class="fa fa-warning"></i> <span>Pagar</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
