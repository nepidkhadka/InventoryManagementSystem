<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\categories;
use App\products;
use App\customers;
use App\suppliers;
use App\sales;
use App\routes;
use App\User;

use JeroenNoten\LaravelAdminLte\Components\Widget\Alert;

class listcontroller extends Controller
{
    function showproduct()
    {
        $data = products::with('categories','suppliers')->get();
        // dd($data);
        return view('admin\listproduct',['listproduct'=>$data]);

    }

    function showsales()
    {
        $data = sales::with('products','customers', 'User')->orderBy('id','desc')->get();
        // dd($data);
        return view('admin\listsales',['salesdata'=>$data]);
    }

    function listprofitloss() {
        $totalPurchase = products::sum('price'); 
        $totalpurchaseqty = products::sum('quantity'); 
        $totalSell = sales::sum('sellingprice'); 
        $totaldiscount = sales::sum('discount'); 
        $totalsalesqty = sales::sum('quantity'); 
        $grandtotalpurchase = products::sum('totalprice');
        $grandtotalsales = $totalSell * $totalsalesqty;
        $profit =  $grandtotalsales - $grandtotalpurchase - $totaldiscount; 
        // $totalPurchase = products::sum('price'); 
        // $totalpurchaseqty = products::sum('quantity'); 
        // $totalSell = sales::sum('sellingprice'); 
        // $totalsalesqty = sales::sum('quantity'); 
        // $grandtotalpurchase = $totalPurchase * $totalpurchaseqty;
        // $grandtotalsales = $totalSell * $totalsalesqty;
        // $profit =  $grandtotalsales - $grandtotalpurchase; 
        $allproduct = products::all();
        return view('admin\listprofitloss',compact('profit','grandtotalpurchase','grandtotalsales'));
      }

    function showusers()
    {
        $data = user::all();
        return view('admin\usersdata',['usersdata'=>$data]);
    }


    function deleteuser($id)
    {
        $data=user::find($id);
        if($id == '1')
        {
            return redirect('users')->with('superadmin','No Action Available');
        }else{
            $data->delete();
            return redirect('users')->with('delete','User Removed Sucessfully');
        }
    }

    function showcategory()
    {
        // $data = categories::all()->where('status', '1');
        $data = categories::all();
        return view('admin\listcategory',['listcategory'=>$data]);
    }

    function showcustomer()
    {
        // $data = categories::all()->where('status', '1');
        $data = customers::all();
        return view('admin\listcustomer',['listcustomer'=>$data]);
    }

    function showsupplier()
    {
        // $data = categories::all()->where('status', '1');
        $data = suppliers::all();
        return view('admin\listsupplier',['listsupplier'=>$data]);
    }

      function showupdateproduct()
    {
        $data = products::all();
        return view('admin\updateproduct',['updateproduct'=>$data]);
    }

    function updatecategory()
    {
        $data = categories::all();
        return view('admin\updatecategory',['updatecategory'=>$data]);
    }

    function updatecustomer()
    {
        $data = customers::all();
        return view('admin\updatecustomer',['updatecustomer'=>$data]);
    }

    function updatesales()
    {
        $data = sales::all();
        return view('admin\updatesales',['updatesales'=>$data]);
    }

    function updatesuppliers()
    {
        $data = suppliers::all();
        return view('admin\updatesupplier',['updatesupplier'=>$data]);
    }


    function editcategory($id)
    {
        $data = categories::find($id);
        return view('admin\editcategory',['data'=>$data]);

    }

    function deletecategory($id)
    {
        $data=categories::find($id);
        $data->delete();
        return redirect('updatecategory')->with('danger','Category Removed Sucessfully');
    }

    function deleteproduct($id)
    {
        $data=products::find($id);
        $data->delete();
        return redirect('updateproduct')->with('danger','Product Removed Sucessfully');
    }
    
    function deletecustomer($id)
    {
        $data=customers::find($id);
        $data->delete();
        return redirect('updatecustomers')->with('danger','Customer Removed Sucessfully');
    }

    function deletesales($id)
    {
        $data=sales::find($id);
        $data->delete();
        return redirect('updatesales')->with('danger','Sales Removed Sucessfully');
    }

    function deletesupplier($id)
    {
        $data=suppliers::find($id);
        $data->delete();
        return redirect('updatesuppliers')->with('danger','Supplier Removed Sucessfully');
    }
    

    function showeditproduct($id)
    {
        $data = products::find($id);
        // dd($data);
        $categories = categories::all();
        return view('admin\editproduct', compact('categories','data'));

        // return view('admin\editproduct', compact('categories','')['data'=>$data]);
        
        // $data = products::with('categories')->get();
        // return view('admin\listproduct',['listproduct'=>$data]);

    }

    
    function showeditcustomer($id)
    {
        $data = customers::find($id);
        return view('admin\editcustomer', compact('data'));

    }

    function showeditsupplier($id)
    {
        $sdata = suppliers::find($id);
        return view('admin\editsupplier', compact('sdata'));

    }

    function edit(Request $req)
    {
        $data=categories::find($req->id);
        $data->name=$req->name;
        //$data->busnumber=$req->busnumber;
        // $data->bustype=$req->bustype;
        $data->save();
        return redirect('updatecategory')->with('success','Category Has Been Updated Sucessfully');
    }

    function editproductform(Request $req)
    {
        // dd($req->all());
        $data=products::find($req->id);
        $data->name=$req->name;
        $data->categorieid=$req->categorieid;
        $data->quantity=$req->input('quantity');
        $data->price=$req->input('price');
        $data->date=$req->date;
        $data->totalprice = $data->quantity*$data->price; 
        $data->save();
        return redirect('updateproduct')->with('success','Product Has Been Updated Sucessfully');

    }

    function submiteditcustomer(Request $req)
    {
        // dd($req->all());
        $data=customers::find($req->id);
        //$data->name=$req->name;
       // $data->licenseno=$req->licenseno;
        $data->firstname=$req->firstname;
        $data->lastname=$req->lastname;
        $data->address=$req->address;
        $data->phonenumber=$req->phonenumber;
        $data->save();
        return redirect('updatecustomers')->with('success','Customer Has Been Updated Sucessfully');
    }

    function submiteditsupplier(Request $req)
    {
        // dd($req->all());
        $data=suppliers::find($req->id);
        //$data->name=$req->name;
       // $data->licenseno=$req->licenseno;
        $data->company=$req->company;
        $data->contactperson=$req->contactperson;
        $data->address=$req->address;
        $data->contactnumber=$req->contactnumber;
        $data->save();
        return redirect('updatesuppliers')->with('success','Suppliers Has Been Updated Sucessfully');
    }

}


