@extends('adminlte::page')

@section('title', 'Edit Product')

@section('content_header')
    <h1>Edit Product</h1>
@stop

@section('content')
    
@section('content')
<div class="alert alert-dark" role="alert">
    Fill up the below information to edit products
</div>

    <hr>

@if(\Session::has('success'))
<div class="alert alert-success">
    <h6>{{ \Session::get('success') }}</h6>
</div>
    
@endif

<form action="/editproductform" method="POST" >

    @csrf

    <input type= "hidden" name="id" value="{{$data->id}}">

    <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Product Name </label>
            <input type="text" value="{{$data->name}}" class="form-control" id="exampleFormControlInput1" name="name" placeholder="Eg. LG TV"  autofocus required>
        </div>
        
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Category :</label>
        <select class="form-control" name="categorieid" id="categorieid">
                <!-- <option value="{{$data->categorieid}}" >{{$data->categories->id}}.{{$data->categories->name}}</option>   -->
                @foreach ($categories as $categoryname)
                <option value="{{$categoryname->id}}" @if(isset($data)&& $data->categorieid==$categoryname->id) selected @endif>{{$categoryname->id}}. {{$categoryname->name}}</option>  
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Product Quantity </label>
            <input  value="{{$data->quantity}}" autocomplete="false" type="number" class="form-control" id="exampleFormControlInput1" name="quantity"  placeholder="EG. 5,10" required>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label"> Price (NPR) </label>
            <input autocomplete="false"  value="{{$data->price}}" type="number" class="form-control" id="exampleFormControlInput1" name="price"  placeholder="EG. Rs 1,000 (Per Unit)" required>
        </div>


        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Date </label>
            <input value="{{$data->date}}" type="date" min="2022-03-01" max="2022-03-31" class="form-control" id="exampleFormControlInput1" name="date" required>
        </div>
    
    <!-- Button trigger modal -->
    <button type="submit" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModalLong">
    Update Product
    </button>
</form>

@stop




