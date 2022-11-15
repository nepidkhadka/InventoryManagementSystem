@extends('adminlte::page')

@section('title', 'Update Suppliers')

@section('content_header')
    <h1>Update Suppliers</h1>
@stop

@section('content')
    <div class="alert alert-dark" role="alert">
        The available suppliers to update are listed below
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
              <th scope="col">Supplier ID</th>
                <th scope="col">Company Name</th>
                <th scope="col">Contact Person</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Address</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>

            @foreach($updatesupplier as $sdata)

            <tbody>
              <tr>     
                <td>{{$sdata->id}}</td>         
                <td>{{$sdata->company}}</td>         
                <td>{{$sdata->contactperson}}</td>         
                <td>{{$sdata->address}}</td>
                <td>{{$sdata->contactnumber}}</td>  
                <td>
                    <a class="btn btn-outline-warning btn-sm" href={{"editsupplier/".$sdata['id']}}>Edit</a>
                </td>        
                <td> 
                    <a class="btn btn-outline-danger btn-sm" href={{"deletesupplier/".$sdata['id']}}> Delete </a> 
                </td>
            </tr>             
            </tbody>
            @endforeach
    </table>
  
  
@stop