@extends('adminlte::page')

@section('title', 'Update Product')

@section('content_header')
    <h1>Update Product</h1>
@stop

@section('content')
    <div class="alert alert-dark" role="alert">
        The available product to update are listed below
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
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Supplier</th>
                <th scope="col">Quantity(Unit)</th>
                <th scope="col">Price (NPR)</th>
                <!-- <th  colspan="2" scope="col">Rate(Buying & Selling)</th> -->
                <th scope="col">Added Date</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>

            @foreach($updateproduct as $updateproduct)

            <tbody>
              <tr>     
                 <td>{{$updateproduct->id}}</td>         
                <td>{{$updateproduct->name}}</td>
                <td>{{$updateproduct->categories->name}}</td>
                <td>{{$updateproduct->suppliers->company}}</td>
                <td>{{$updateproduct->quantity}}</td>
                <td>Rs.{{$updateproduct->price}}</td>
                <td>{{$updateproduct->date}}</td>
                <td>

                    <a class="btn btn-outline-warning btn-sm" href={{"editproduct/".$updateproduct['id']}}>Edit</a>

                </td>

                <td> 
                    <a class="btn btn-outline-danger btn-sm" href={{"deleteproduct/".$updateproduct['id']}}> Delete </a> 
                </td>
            </tr>             
            </tbody>
            @endforeach
    </table>
  
  
@stop