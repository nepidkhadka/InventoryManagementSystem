@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
<h1>Hello, Welcome to  " Mero Inventory "</h1>
@stop

@section('content')

<div class="card">
  <div class="card-header">
    Message
  </div>
  <div class="card-body">
    <blockquote class="blockquote my-0">
      Please navigate with menus for various inventory management & control operation.
      <!-- <p></p> -->
    </blockquote>
    <hr>
    <p>
    <div class="alert alert-primary" role="alert">
      <b> 1 .Dashboard:</b>
      Get a quick overview with graphs.
      See total categories, products, customers, suppliers, sales, stock, and users.
      <br>
    </div>
    <div class="alert alert-secondary" role="alert">
      <b>2. Categories/Products:</b>
      Easily add and list categories and products.
      Organize your inventory effortlessly.
      <br>
    </div>
    <div class="alert alert-success" role="alert">
      <b>3. Customer/Suppliers: </b>
      Manage your customer and supplier info.
      Add new contacts and stay connected.
      <br>
    </div>
    <div class="alert alert-danger" role="alert">
      <b>4. Sales:</b>
      Record and manage sales transactions.
      Keep track of what's selling.
      <br>
    </div>
    <div class="alert alert-warning" role="alert">
      <b>5. Management:</b>
      Update categories, products, customers, suppliers, and sales.
      Stay in control of your business data.
      <br>
    </div>
    <div class="alert alert-info" role="alert">
      <b>6. Calculation: </b>
      Calculate your profit/loss in a snap.
      Understand your financial health.
      <br>
    </div>
    <div class="alert alert-light" role="alert">
      <b>7. Account Settings:</b>
      Manage users and their access.
      Keep your software secure.
    </div>
    <hr>
    🚀 Your Complete Inventory Management & Control Solution 🚀
    <hr>

    </p>
  </div>
</div>



<!-- <img src="{{url('/images/logo.png')}}" class="card-img-top" alt="..."> -->
@stop