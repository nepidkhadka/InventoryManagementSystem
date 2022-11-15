@extends('adminlte::page')

@section('title', 'Edit Category')

@section('content_header')
    <h1>Edit Category</h1>
@stop

@section('content')
    
@section('content')
<div class="alert alert-dark" role="alert">
    Fill up the below information to edit category
</div>

    <hr>

@if(\Session::has('success'))
<div class="alert alert-success">
    <h6>{{ \Session::get('success') }}</h6>
</div>
    
@endif

<form action="/edit" method="POST" >

    @csrf

    <input type= "hidden" name="id" value="{{$data->id}}">

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Category Name </label>
        <input type="text" class="form-control" value="{{$data->name}}" name="name"autofocus required>
    </div>
    <!-- Button trigger modal -->
    <button type="submit" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModalLong">
    Update Category
    </button>
</form>

@stop




