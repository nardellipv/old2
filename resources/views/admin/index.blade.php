@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">

<style>
    html,
    body,
    #container {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
    }
</style>
@endsection


@section('content')
@include('admin.parts._widget')
@include('admin.parts._clients')
@include('admin.parts._selling')
@endsection

@section('script')
<script src="{{ asset('assets/bundles/datatablescripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/jquery-datatable.js') }}"></script>

<script src="https://cdn.anychart.com/releases/8.11.1/js/anychart-core.min.js"></script>
<script src="https://cdn.anychart.com/releases/8.11.1/js/anychart-cartesian.min.js"></script>
<script src="https://cdn.anychart.com/releases/8.11.1/js/anychart-base.min.js"></script>

<script>
    var data = [
        @foreach ($sellingCount as $sell)
            {x:"{{ \Carbon\Carbon::parse($sell->created_at)->format('d/m') }}", value:{{ $sell->sum }}},
        @endforeach
    ];

    // create a chart
    chart = anychart.line();

    // create a line series and set the data
    var series = chart.line(data);

    // set the container id
    chart.container("container");

    // initiate drawing the chart
    chart.draw();
</script>
@endsection
