@extends('adminlte::page')

@section('title', 'Customer List')

@section('content_header')
    <h1>Customer List</h1>
@stop

@section('content')
    <div class="alert alert-dark" role="alert">
        The added customer are listed below
    </div>

    @if(\Session::has('success'))
    <div class="alert alert-success">
        <h6>{{ \Session::get('success') }}</h6>
    </div>
        
    @endif

    <hr>

    <table id="myTable" class="table table-bordered table-striped">
    <div class="my-3 d-flex flex-row-reverse" >
    <button class="btn btn-success py-2 px-3 mx-1 ">Export PDF</button>
  </div>
            <thead class="table-dark">
              <tr>
                <th scope="col">Customer ID</th>
                <th scope="col">Full Name</th>
                <th scope="col">Address</th>
                <th scope="col">Phone Number</th>
              </tr>
            </thead>

            @foreach($listcustomer as $cdata)

            <tbody>
              <tr>  
                <td>{{$cdata->id}}</td>         
                <td>{{$cdata->firstname}} {{$cdata->lastname}}</td>         
                <td>{{$cdata->address}}</td>
                <td>{{$cdata->phonenumber}}</td>
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