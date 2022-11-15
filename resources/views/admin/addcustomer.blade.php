@extends('adminlte::page')

@section('title', 'Add Customer')

@section('content_header')
    <h1>Add Customer</h1>
@stop

@section('content')
    <div class="alert alert-dark" role="alert">
        Fill up the below information to add customer
    </div>

        <hr>
    
    @if(\Session::has('success'))
    <div class="alert alert-success">
        <h6>{{ \Session::get('success') }}</h6>
    </div>
        
    @endif

    <form method="post" action="/submitcustomer">
        {{csrf_field()}}

        <form>

            <label for="inputEmail4" class="form-label" >Full Name</label>
            <div class="mb-3">
                <div class="form-row">
                    <div class="col">
                    <input type="text" class="form-control" name="firstname" pattern="[a-zA-Z]+" placeholder="First name" required autofocus>
                    </div>
                    <div class="col">
                    <input type="text" class="form-control" name="lastname" pattern="[a-zA-Z]+"" required placeholder="Last name">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Address </label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="address" placeholder="EG. Lubhu" pattern="[a-zA-Z\s]+" required>
                     <div class="col">
                </div>
            </div>
    
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Phone Number </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="phonenumber" pattern="[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}" placeholder="EG. 9808465246" required>
            </div>
          </form>
       
                  
        <!-- Button trigger modal -->
        <button type="submit" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModalLong" required>
        Add Customer
        </button>
    </form>
  
@stop