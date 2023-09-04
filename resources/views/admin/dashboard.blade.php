@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1> Dashboard </h1>
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
    <span id="purchaseprice"info-box-number">{{ $grandtotalpurchase }}</span>
  </div>
</div>

<div class="info-box bg-green">
  <span class="info-box-icon"><i class="far fa-minus-square"></i></span>
  <div class="info-box-content">
    <span class="info-box-text">Total Sells</span>
    <span id="salesprice"info-box-number">{{ $grandtotalsales }}</span>
  </div>
</div>

<div class="info-box bg-gray">
  <span class="info-box-icon"><i class="far fa-copy"></i></span>
  <div class="info-box-content">
    <span class="info-box-text">Total Profit/Loss</span>
    <span id="profitprice"info-box-number">{{ $profit }}</span>
  </div>
</div>


<script>

const formatNumberWithCommas = (number) => {
    const numberString = String(number);
    
    if (numberString.length === 5) {
        return numberString.substring(0, 2) + ',' + numberString.substring(2);
    } else if (numberString.length === 6) {
        return numberString.substring(0, 1) + ',' + numberString.substring(1, 3) + ',' + numberString.substring(3);
    } else if (numberString.length === 7) {
        return numberString.substring(0, 2) + ',' + numberString.substring(2, 4) + ',' + numberString.substring(4);
    } else {
        return numberString;
    }
}

//purchase
const purchasepricenode = document.getElementById("purchaseprice");
const purchasepricedata = purchasepricenode.textContent;
const formattedpurchasepricedata = formatNumberWithCommas(purchasepricedata);
purchasepricenode.textContent = "Rs." + formattedpurchasepricedata;

//sales
const salespricenode = document.getElementById("salesprice");
const salespricedata = salespricenode.textContent;
const formattedsalespricedata = formatNumberWithCommas(salespricedata);
salespricenode.textContent = "Rs." + formattedsalespricedata;

//profti&sales
const profitlosspricenode = document.getElementById("profitprice");
const profitlosspricedata = profitlosspricenode.textContent;
const formattedprofitlosspricedata = formatNumberWithCommas(profitlosspricedata);
profitlosspricenode.textContent = "Rs." + formattedprofitlosspricedata;



</script>

@stop