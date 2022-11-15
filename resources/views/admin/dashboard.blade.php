@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>IMS - Dashboard</h1>
@stop

@section('content')
  <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small card -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{ $total_categories }}</h3>

          <p>Total Categories</p>
        </div>
        <div class="icon">
          <i class="fas  fa-tasks"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small card -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{  $total_products}} </h3>

          <p>Total Products</p>
        </div>
        <div class="icon">
          <i class="fas  fa-shopping-cart"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    
    <div class="col-lg-3 col-6">
      <!-- small card -->
      <div class="small-box bg-maroon">
        <div class="inner">
          <h3>{{ $total_customers }}</h3>

          <p>Total Customers</p>
        </div>
        <div class="icon">
          <i class="fas  fa-users"></i>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-6">
      <!-- small card -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{ $total_suppliers }}</h3>

          <p>Total Suppliers</p>
        </div>
        <div class="icon">
          <i class="fas  fa-truck"></i>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-6">
      <!-- small card -->
      <div class="small-box bg-purple">
        <div class="inner">
          <h3>{{ $total_sales }}</h3>

          <p>Total Sales</p>
        </div>
        <div class="icon">
          <i class="fas  fa-cart-plus"></i>
        </div>
      </div>
    </div>
  
    
    <div class="col-lg-3 col-6">
      <!-- small card -->
      <div class="small-box bg-fuchsia ">
        <div class="inner">
          <h3>{{ $total_stock }}</h3>

          <p>Total Stock</p>
        </div>
        <div class="icon">
          <i class="fas  fa-cart-arrow-down"></i>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-6">
      <!-- small card -->
      <div class="small-box bg-olive ">
        <div class="inner">
          <h3>{{ $total_users }}</h3>

          <p>Registered Users</p>
        </div>
        <div class="icon">
          <i class="fas  fa-child"></i>
        </div>
      </div>
    </div>

  </div>
  <!-- /.row -->

  <div class="info-box bg-blue">
  <span class="info-box-icon"><i class="far fa-check-square"></i></span>
  <div class="info-box-content">
    <span class="info-box-text">Total Purchase</span>
    <span class="info-box-number">Rs.{{ $grandtotalpurchase }}</span>
  </div>
</div>

<div class="info-box bg-green">
  <span class="info-box-icon"><i class="far fa-minus-square"></i></span>
  <div class="info-box-content">
    <span class="info-box-text">Total Sells</span>
    <span class="info-box-number">Rs.{{ $grandtotalsales }}</span>
  </div>
</div>

<div class="info-box bg-gray">
  <span class="info-box-icon"><i class="far fa-copy"></i></span>
  <div class="info-box-content">
    <span class="info-box-text">Total Profit/Loss</span>
    <span class="info-box-number">Rs.{{ $profit }}</span>
  </div>
</div>

@stop