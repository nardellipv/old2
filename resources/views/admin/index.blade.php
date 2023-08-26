@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
@endsection


@section('content')
@include('admin.parts._widget')
@include('admin.parts._clients')
@include('admin.parts._selling')
@endsection

@section('script')
<script src="{{ asset('assets/js/jquery-datatable.js') }}"></script>
<script src="{{ asset('assets/bundles/datatablescripts.bundle.js') }}"></script>
@endsection
