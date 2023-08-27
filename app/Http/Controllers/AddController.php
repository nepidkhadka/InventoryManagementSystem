<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\categories;
use App\routes;
use App\products;
use App\suppliers;
use App\customers;
use App\passenger;
use App\buses;

class AddController extends Controller
{

  public function searchProduct(Request $request)
    {
      // dd('fffff'); 
      $output                = "";
        $product =  products::find($request->search);
        
        $output .= '
       
                        
        <label class="control-label col-md-3" for="time">Quantity/Stock :</label>
        <div class="mb-3">
        <input type="number" name="quantity" value=""  min="1" max="'.$product->quantity.'" placeholder="'.$product->quantity.'" class="form-control" id="qty">
         </div> 
        
        <label class="control-label col-md-3" for="time">Buy Price(Per Peice/Unit) :</label>
        <div class="mb-3">
        <input type="number" name="price" readonly value="'.$product->price.'" class="form-control" id="price"></div>
        ';

        
        // $output .= '
                  // </div>';

        return response($output);
    }
     
    // public function savereservation(Request $request)
    // {
  
    //   $pid = $request->input('pid');
    //   $busid = $request->input('busid');
    //   $routesid = $request->input('routesid');
    //   $date = $request->input('date');
    //   $seatno = $request->input('seatno');
    //   $status = $request->input('status');

    //   DB::insert('insert into reservations (passengerid,busid,routesid ,date,seatno) values (?,?,?,?,?)' 
    //   , [$pid, $busid, $routesid,  $date, $seatno]);
      
    //   return redirect('reservebus')->with('success','Reservation has been made Sucessfully');
    // }

    public function fetchcategorydata()
    {

        // $data = categories::all();
        // return view('admin\addproduct',['categoryname'=>$data]);

        $suppliers = suppliers::all();
        $categories = categories::all();
       
        return view('admin/addproduct',compact('suppliers','categories'));

    }

    public function fetchproductcustomerdata()
    {

      $products = products::where('quantity','>',0)->get();
      $customers = customers::all();
       
      return view('admin/addsales',compact('products','customers'));

    }

}
