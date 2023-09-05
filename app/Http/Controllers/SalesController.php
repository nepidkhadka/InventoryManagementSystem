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
      $userid = auth()->user()->id;
      $product = $request->input('product');
      $pro=products::find($product);
      // dd($pro);
      $customer = $request->input('customer');
      $quantity = $request->input('quantity');
      $sellingprice = $request->input('sellingprice');
      $discount = $request->input('discount');
      $total = $request->input('total');
      $date = $request->input('date');
      
      $pro=products::find($product);
        $pro->quantity=($pro->quantity - $quantity);
        $pro->save();


      DB::insert('insert into sales (	product_id,	customer_id,user_id,quantity,sellingprice,discount,total,date) values (?,?,?,?,?,?,?,?)' 
      , [$product, $customer, $userid, $quantity, $sellingprice, $discount, $total, $date]);
      
      
      
      return redirect('/addsales')->with('success','Sales Has been added Sucessfully');
    }
}
