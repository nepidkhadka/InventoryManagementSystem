<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

class SuppliersControllers extends Controller
{
    public function savesupplier(Request $request)
    {
      
      $companyname = $request->input('companyname');
      $contactperson = $request->input('contactperson');
      $address = $request->input('address');
      $contactnumber = $request->input('contactnumber');
      
      DB::insert('insert into suppliers (company,contactperson,contactnumber,address) values (?,?,?,?)' 
      , [$companyname, $contactperson, $contactnumber, $address]);
      
      return redirect('/addsupplier')->with('success','Suppliers Added Sucessfully');
    }
}
