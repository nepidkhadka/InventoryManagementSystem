@extends('adminlte::page')

@section('title', 'Add Supplier')

@section('content_header')
    <h1>Add Supplier</h1>
@stop

@section('content')
    <div class="alert alert-dark" role="alert">
        Fill up the below information to add supplier
    </div>

        <hr>
    
    @if(\Session::has('success'))
    <div class="alert alert-success">
        <h6>{{ \Session::get('success') }}</h6>
    </div>
        
    @endif

    <form  autocomplete="off" method="post" action="/submitsupplier">
        {{csrf_field()}}

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Company Name </label>
            <input type="text" class="form-control" id="exampleFormControlInput1" pattern="[a-zA-Z\s]+"  name="companyname" placeholder="Eg. ABC Suppliers"  autofocus required>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Contact Person </label>
            <input type="text" class="form-control" id="exampleFormControlInput1" pattern="[a-zA-Z\s]+"  name="contactperson" placeholder="Eg. Krishna Thapa"  autofocus required>
        </div>
        
         <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Address </label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="address" placeholder="EG. Lubhu" pattern="[a-zA-Z\s]+" required>
        </div> 
           
         <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Contact Number </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="contactnumber" pattern="[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}" placeholder="EG. 9808465246" required>
        </div> 

        
        <!-- Button trigger modal -->
        <button type="submit" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModalLong">
        Add Supplier
        </button>
    </form>  

@stop