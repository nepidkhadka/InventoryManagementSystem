@extends('adminlte::page')

@section('title', 'Update Sales')

@section('content_header')
    <h1>Update Sales</h1>
@stop

@section('content')
    <div class="alert alert-dark" role="alert">
        The available sales to update are listed below
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
                <th scope="col">Sales ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Customer Details</th>
                <th scope="col">Quantity</th>
                <th scope="col">Discount</th>
                <th scope="col">Total</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>

            @foreach($updatesales as $salesdata)

            <tbody>
              <tr>     
                <td>{{$salesdata->id}}</td>         
                <td>{{$salesdata->products->name}}</td>         
                <td>{{$salesdata->customers->firstname}}{{$salesdata->customers->lastname}}, {{$salesdata->customers->address}} ({{$salesdata->customers->phonenumber}})</td>         
                <td>{{$salesdata->quantity}}</td>
                <td>Rs. {{$salesdata->discount}}</td>
                <td>Rs. {{$salesdata->total}}</td>              
                <td> 
                    <a class="btn btn-outline-danger btn-sm" href={{"deletesales/".$salesdata['id']}}> Delete </a> 
                </td>
            </tr>             
            </tbody>
            @endforeach
    </table>
  
  
@stop