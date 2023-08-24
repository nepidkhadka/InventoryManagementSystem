@extends('adminlte::page')

@section('title', 'Suppliers List')

@section('content_header')
    <h1>Suppliers List</h1>
@stop

@section('content')
    <div class="alert alert-dark" role="alert">
        The added suppliers are listed below
    </div>

    @if(\Session::has('success'))
    <div class="alert alert-success">
        <h6>{{ \Session::get('success') }}</h6>
    </div>
        
    @endif

    <hr>

    <table id="myTable" class="table table-striped">
            <thead class="table-dark">
              <tr>
                <th scope="col">Supplier ID</th>
                <th scope="col">Company Name</th>
                <th scope="col">Contact Person</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Address</th>
              </tr>
            </thead>

            @foreach($listsupplier as $sdata)

            <tbody>
              <tr>  
                <td>{{$sdata->id}}</td>         
                <td>{{$sdata->company}}</td>         
                <td>{{$sdata->contactperson}}</td>         
                <td>{{$sdata->address}}</td>
                <td>{{$sdata->contactnumber}}</td>
              </tr>             
            </tbody>
            @endforeach
    </table>
  
  
@stop

@section('js')

<script> 
   $(document).ready(function () {
      $('#myTable').DataTable();
   });
</script>
@stop