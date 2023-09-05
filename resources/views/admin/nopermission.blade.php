@extends('adminlte::page')

@section('title', 'Access Denied')

@section('content_header')
<h1>Access Denied !</h1>
@stop

@section('content')
@if(\Session::has('messsage'))
<div class="alert alert-danger">
    <h6>{{ \Session::get('messsage') }}</h6>
</div>
@endif

<style>
    .object-fit-none{
        object-fit: none;
        margin-block: -40px;
    }
</style>

<div class="card text-center">
    <div class="card-header">
        Message
    </div>
    <div class="card-body my-0">
        <p class="card-text my-0">
            <img class="w-50 object-fit-none" src="{{ asset('images/NoPermission.png') }}" alt="">
        </p>
        <a href="/dashboard" class="btn btn-primary">Return To Dashboard</a>
    </div>
    <div class="card-footer text-body-secondary">
        1 mins ago
    </div>
</div>


@stop