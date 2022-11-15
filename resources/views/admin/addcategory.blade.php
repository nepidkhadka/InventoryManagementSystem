@extends('adminlte::page')

@section('title', 'Add Categories')

@section('content_header')
    <h1>Add Categories</h1>
@stop

@section('content')
    <div class="alert alert-dark" role="alert">
        Fill up the below information to add Categories
    </div>

        <hr>
    
    @if(\Session::has('success'))
    <div class="alert alert-success">
        <h6>{{ \Session::get('success') }}</h6>
    </div>
        
    @endif

    <form method="post" action="/submitcategory">
        {{csrf_field()}}

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Category Name </label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="name" pattern="[a-zA-Z\s]+"  placeholder="Eg. Machinery" autofocus required>
        </div>        
        <!-- Button trigger modal -->
        <button type="submit" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModalLong" required>
        Add Category
        </button>
    </form>

    
  
@stop