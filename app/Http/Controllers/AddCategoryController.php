<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class AddCategoryController extends Controller
{
    public function savecategory(Request $request)
    {
  
      $name = $request->input('name');
      
      DB::insert('insert into categories (name) values (?)' 
      , [$name]);
      
      return redirect('addcategory')->with('success','Category Added Sucessfully');
    }

}
