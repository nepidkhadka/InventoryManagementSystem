@extends('adminlte::page')

@section('title', 'Sales List')

@section('content_header')
    <h1>Sales List</h1>
@stop

@section('content')
    <div class="alert alert-dark" role="alert">
        The added sales are listed below
    </div>

    @if(\Session::has('success'))
    <div class="alert alert-success">
        <h6>{{ \Session::get('success') }}</h6>
    </div>
        
    @endif

    <hr>

    <table class="table table-bordered table-striped">
            <thead class="table-dark">
              <tr>
                <th scope="col">Sales ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Customer Details</th>
                <th scope="col">Quantity</th>
                <th scope="col">Discount</th>
                <th scope="col">Total</th>
              </tr>
            </thead>

            @foreach($salesdata as $salesdata)

            <tbody>
              <tr>  
                <td>{{$salesdata->id}}</td>         
                <td>{{$salesdata->products->name}}</td>         
                <td>{{$salesdata->customers->firstname}}{{$salesdata->customers->lastname}}, {{$salesdata->customers->address}} ({{$salesdata->customers->phonenumber}})</td>         
                <td>{{$salesdata->quantity}}</td>
                <td>Rs. {{$salesdata->discount}}</td>
                <td>Rs. {{$salesdata->total}}</td>
              </tr>             
            </tbody>
            @endforeach
    </table>
  
  
@stop