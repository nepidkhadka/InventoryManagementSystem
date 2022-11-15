@extends('adminlte::page')

@section('title', 'Product List')

@section('content_header')
    <h1>Product List</h1>
@stop

@section('content')
    <div class="alert alert-dark" role="alert">
        The recorded product are listed below
    </div>

    <hr>

    <table class="table table-bordered table-striped">
            <thead class="table-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Supplier</th>
                <th scope="col">Quantity(Unit)</th>
                <th scope="col">Rate (NPR)</th>
                <!-- <th  colspan="2" scope="col">Rate(Buying & Selling)</th> -->
                <th scope="col">Added Date</th>
              </tr>
            </thead>

            @foreach($listproduct as $listproduct)

            <tbody>
              <tr>  
                <td>{{$listproduct->id}}</td>         
                <td>{{$listproduct->name}}</td>
                <td>{{$listproduct->categories->name}}</td>
                <td>{{$listproduct->suppliers->company}}</td>
                <td>{{$listproduct->quantity}}</td>
                <td>Rs.{{$listproduct->price}}</td>
                <td>{{$listproduct->date}}</td>
              </tr>             
            </tbody>
            @endforeach
            </table>


         
    
  
  
@stop