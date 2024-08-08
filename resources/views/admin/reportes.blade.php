@extends('layouts.dashboard')

@section('ruta', 'Reportes')
@section('title', 'Reportes')
@section('content')

    <!--Orinson-->
    <div class="col-md-12">
        @include('admin.reportes.orinson')
    </div>

    <!--Sebastian-->
    <div class="col-md-12">
        @include('admin.reportes.sebastian')
    </div>

    <!--Carlos-->
    <div class="col-md-12">
        @include('admin.reportes.carlos')
    </div>


    <!--Alvaro-->
    <div class="col-md-12">
        @include('admin.reportes.alvaro')
    </div>


    <!--Diego-->
    <div class="col-md-12">
        @include('admin.reportes.diego')
    </div>

    <!--Marco-->
    <div class="col-md-12">
        @include('admin.reportes.marco')
    </div>

    <!--Joseph-->
    <div class="col-md-12">
        @include('admin.reportes.joseph')
    </div>
@endsection
