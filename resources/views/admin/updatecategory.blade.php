@extends('adminlte::page')

@section('title', 'Update Category')

@section('content_header')
    <h1>Update Category</h1>
@stop

@section('content')
    <div class="alert alert-dark" role="alert">
        The available Category to update are listed below
    </div>

    <hr>
    
    @if(\Session::has('success'))
    <div class="alert alert-success">
        <h6>{{ \Session::get('success') }}</h6>
    </div>
        
    @endif

    @if(\Session::has('danger'))
    <div class="alert alert-danger">
        <h6>{{ \Session::get('danger') }}</h6>
    </div>
        
    @endif

    <table class="table table-bordered table-striped">
            <thead class="table-dark">
              <tr>
                <th scope="col">Category ID</th>
                <th scope="col">Category Name</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>

            @foreach($updatecategory as $updatecategory)

            <tbody>
              <tr>     
                <td>{{$updatecategory->id}}</td>               
                <td>{{$updatecategory->name}}</td>
                <td>

                    <a class="btn btn-outline-warning btn-sm" href={{"edit/".$updatecategory['id']}}>Edit</a>

                </td>
                <td> 
                    <a class="btn btn-outline-danger btn-sm" href={{"delete/".$updatecategory['id']}}> Delete </a> 
                </td>
            </tr>             
            </tbody>
            @endforeach
    </table>
  
  
@stop