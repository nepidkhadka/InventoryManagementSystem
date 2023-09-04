<?php

namespace App\Http\Controllers;
use App\categories;
use App\products;
use App\customers;
use App\suppliers;
use App\sales;
use App\routes;
use App\User;
use App\drivers;
use App\reservation;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin/admin');
    }

    public function usersdata()
    {
        return view('admin/usersdata');
    }

    public function dashboard()
    {
        return view('admin/dashboard');
    }

    public function addproduct()
    {
        return view('admin/addproduct');
    }

    public function addcategory()
    {
        return view('admin/addcategory');
    }

    public function addcustomer()
    {
        return view('admin/addcustomer');
    }

    public function addsupplier()
    {
        return view('admin/addsupplier');
    }

    public function dashcount()
    {
        $total_categories = categories::count();
        $total_products = products::count();
        $total_users = User::count();
        $total_customers = customers::count();
        $total_suppliers = suppliers::count();
        $total_sales = sales::count();
        $total_stock = products::sum('quantity');

        $totalPurchase = products::sum('price'); 
        $totalpurchaseqty = products::sum('quantity'); 
        $totalSell = sales::sum('sellingprice'); 
        $totaldiscount = sales::sum('discount'); 
        $totalsalesqty = sales::sum('quantity'); 
        $grandtotalpurchase = products::sum('totalprice');
        $grandtotalsales = $totalSell * $totalsalesqty;
        $profit =  $grandtotalsales - $grandtotalpurchase - $totaldiscount; 
        

        return view('admin/dashboard',compact('total_categories','total_products', 'total_users','total_customers','total_suppliers','total_sales','total_stock','grandtotalpurchase','grandtotalsales','profit'));
        // ,'total_drivers','added_passengers','total_reservation'
    }
}
