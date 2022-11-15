@extends('adminlte::page')

@section('title', 'Total Sales & Profit/Loss')

@section('content_header')
    <h1>Total Sales & Profit/Loss</h1>
@stop

@section('content')
    <div class="alert alert-dark" role="alert">
        The Total Sales & Profit are listed below
    </div>
    <hr>

    <table class="table table-bordered table-striped table-hover">
    <thead  class="bg-dark text-center">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Total </th>
              </tr>
            </thead>          
           
            <tbody class="text-center"> 
            <tr>  
                <td>Total Sells</td>         
                <td>Rs. {{$grandtotalsales}}</td>                 
            </tr>             
            <tr>  
                <td>Total Purchase</td>         
                <td>Rs.{{ $grandtotalpurchase}}</td>                 
            </tr>             
            <tr>  
                <td>Total Profit/Loss</td>         
                <td>Rs.{{ $profit}}.00</td>                 
            </tr>             
            </tbody>      
    </table>
  
  
@stop