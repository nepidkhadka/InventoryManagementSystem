@extends('adminlte::page')

@section('title', 'Add Product')

@section('content_header')
    <h1>Add Product</h1>
@stop

@section('content')
    <div class="alert alert-dark" role="alert">
        Fill up the below information to add product
    </div>

        <hr>
    
    @if(\Session::has('success'))
    <div class="alert alert-success">
        <h6>{{ \Session::get('success') }}</h6>
    </div>
        
    @endif

    <form  autocomplete="off" method="post" action="/submitproduct">
        {{csrf_field()}}

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Product Name </label>
            <input type="text" class="form-control" id="exampleFormControlInput1" pattern="[a-zA-Z\s]+"  name="name" placeholder="Eg. LG TV"  autofocus required>
        </div>
        
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Category :</label>
        <select class="form-control" name="categoryid" id="categoryid">
            @foreach ($categories as $categoryname)
                <option value="{{$categoryname->id}}">{{$categoryname->id}}. {{$categoryname->name}}</option>  
            @endforeach
            </select>
        </div>
        
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Supplier :</label>
        <select class="form-control" name="supplierid" id="supplierid">
            @foreach ($suppliers as $suppliers)
            <option value="{{$suppliers->id}}">{{$suppliers->id}}. {{$suppliers->company}}</option>  
            @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Product Quantity : </label>
            <input autocomplete="false" type="number" class="form-control" pattern="[0-9]+" id="exampleFormControlInput1" name="quantity"  placeholder="EG. 5,10" required>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label"> Price (NPR) :</label>
            <input autocomplete="false" type="number" class="form-control" id="exampleFormControlInput1" name="price"  placeholder="EG. Rs 1,000 (Per Unit/Piece)" required>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Date : </label>
            <input type="date" min="2022-02-01" max="2022-03-31" class="form-control" id="exampleFormControlInput1" name="date" required>
        </div>
       
        
        <!-- Button trigger modal -->
        <button type="submit" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModalLong">
        Add Product
        </button>
    </form>  

@stop