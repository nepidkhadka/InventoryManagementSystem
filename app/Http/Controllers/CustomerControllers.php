<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

class CustomerControllers extends Controller
{
    public function savecustomer(Request $request)
    {
  
      $firstname = $request->input('firstname');
      $lastname = $request->input('lastname');
      $address = $request->input('address');
      $phonenumber = $request->input('phonenumber');
      
      DB::insert('insert into customers (firstname,lastname,address,phonenumber) values (?,?,?,?)' 
      , [$firstname, $lastname,  $address, $phonenumber]);
      
      return redirect('/addcustomer')->with('success','Customer Added Sucessfully, You can proceed for Sales');
    }
}
