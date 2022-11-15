<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;

class AddroutesController extends Controller
{
    public function saveroutes(Request $request)
    {
  
      $sourcelocation = $request->input('sourcelocation');
      $destinationlocation = $request->input('destinationlocation');
      $routename = $request->input('routename');
  
      DB::insert('insert into routes (sourcelocation,destinationlocation,routename) values (?,?,?)' 
      , [$sourcelocation,  $destinationlocation, $routename]);
      
      return redirect('addroutes')->with('success','Routes Added Sucessfully');
    }
}
