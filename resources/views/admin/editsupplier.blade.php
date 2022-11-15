@extends('adminlte::page')

@section('title', 'Edit Supplier')

@section('content_header')
    <h1>Edit Supplier</h1>
@stop

@section('content')
    
@section('content')
<div class="alert alert-dark" role="alert">
    Fill up the below information to edit Supplier
</div>

    <hr>

@if(\Session::has('success'))
<div class="alert alert-success">
    <h6>{{ \Session::get('success') }}</h6>
</div>
    
@endif

<form action="/submiteditsupplier" method="POST" >

    @csrf

    <input type= "hidden" name="id" value="{{$sdata->id}}">

    <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Company Name </label>
            <input type="text" class="form-control" readonly value="{{$sdata->company}}" id="exampleFormControlInput1" pattern="[a-zA-Z\s]+"  name="company" placeholder="Eg. ABC Suppliers"   required>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Contact Person </label>
            <input type="text" class="form-control" value="{{$sdata->contactperson}}" id="exampleFormControlInput1" pattern="[a-zA-Z\s]+"  name="contactperson" placeholder="Eg. Krishna Thapa"   required>
        </div>
        
         <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Address </label>
            <input type="text" class="form-control" value="{{$sdata->address}}" id="exampleFormControlInput1" name="address" placeholder="EG. Lubhu" pattern="[a-zA-Z\s]+" required>
        </div> 
           
         <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Contact Number </label>
                <input type="text" class="form-control" value="{{$sdata->contactnumber}}" id="exampleFormControlInput1" name="contactnumber" pattern="[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}" placeholder="EG. 9808465246" required>
        </div> 

        
        <!-- Button trigger modal -->
        <button type="submit" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModalLong">
        Update Supplier
        </button>
</form>

@stop




