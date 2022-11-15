<?php

namespace App\Http\Controllers;
use DB;
use App\products;

use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function savesales(Request $request)
    {
      // dd($request->all());
      $product = $request->input('product');
      $pro=products::find($product);
      // dd($pro);
      $customer = $request->input('customer');
      $quantity = $request->input('quantity');
      $sellingprice = $request->input('sellingprice');
      $discount = $request->input('discount');
      $total = $request->input('total');
      
      $pro=products::find($product);
        $pro->quantity=($pro->quantity - $quantity);
        $pro->save();


      DB::insert('insert into sales (	product_id,	customer_id,quantity,sellingprice,discount,total) values (?,?,?,?,?,?)' 
      , [$product, $customer, $quantity,$sellingprice ,$discount,$total]);
      
      
      
      return redirect('/addsales')->with('success','Sales Has been added Sucessfully');
    }
}
