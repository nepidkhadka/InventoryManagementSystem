@extends('adminlte::page')

@section('title', 'Update Customer')

@section('content_header')
    <h1>Update Customer</h1>
@stop

@section('content')
    <div class="alert alert-dark" role="alert">
        The available customer to update are listed below
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
              <th scope="col">Customer ID</th>
                <th scope="col">Full Name</th>
                <th scope="col">Address</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>

            @foreach($updatecustomer as $cdata)

            <tbody>
              <tr>     
                <td>{{$cdata->id}}</td>         
                <td>{{$cdata->firstname}} {{$cdata->lastname}}</td>         
                <td>{{$cdata->address}}</td>
                <td>{{$cdata->phonenumber}}</td>
                <td>

                    <a class="btn btn-outline-warning btn-sm" href={{"editcustomer/".$cdata['id']}}>Edit</a>

                </td>
                <td> 
                    <a class="btn btn-outline-danger btn-sm" href={{"deletecustomer/".$cdata['id']}}> Delete </a> 
                </td>
            </tr>             
            </tbody>
            @endforeach
    </table>
  
  
@stop