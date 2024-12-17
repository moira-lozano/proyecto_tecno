@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

{{-- @section('content')

    @if (auth()->user()->hasRole('administrador'))
        <p>Bienvenido, Administrador Don</p>
    @endif

    @if (auth()->user()->hasRole('cliente'))
        <p>Bienvenido, Cliente</p>
    @endif
    <p>Welcome to this beautiful admin panel.</p>
@stop --}}

@section('content')
    <p>Bienvenido, {{ ucfirst(auth()->user()->rol) }}</p>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
