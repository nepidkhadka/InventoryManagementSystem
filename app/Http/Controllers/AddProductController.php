<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class AddProductController extends Controller
{
   public function saveproduct(Request $request)
  {

    $productname = $request->input('name');
    $categoryid = $request->input('categoryid');
    $supplierid = $request->input('supplierid');
    $quantity = $request->input('quantity');
    $price = $request->input('price');
    $date = $request->input('date');
    $totalprice = $quantity * $price; 

    DB::insert('insert into products (name,quantity,price,categorieid,supplierid,date,totalprice) values (?,?,?,?,?,?,?)' 
    , [$productname,  $quantity, $price, $categoryid, $supplierid, $date, $totalprice]);
    
    return redirect('addproduct')->with('success','Product Added Sucessfully');
  }

}

// $data=$request->all();     
    // $savedata=new addbus;
    // $savedata->busname=$data['busname'];
    // $savedata->busnumber=$data['busnumber'];
    // $savedata->drivername=$data['drivername'];
    // $savedata->totalseats=$data['totalseats'];
    // $savedata->save();