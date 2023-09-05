<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();


Route::middleware(['auth'])->group(function () {

Route::get('/dashboard', 'HomeController@dashcount')->name('dashboard');

Route::get('/home', 'HomeController@index')->name('home');


//No Permission
Route::get('/nopermission', 'HomeController@nopermission')->name('nopermission');

//   ALL ADD 
Route::get('/addcategory', 'HomeController@addcategory')->name('addcategory');

Route::get('/addcustomer', 'HomeController@addcustomer')->name('addcustomer');

Route::get('/addsupplier', 'HomeController@addsupplier')->name('addsupplier');

Route::get('/addproduct', 'AddController@fetchcategorydata')->name('fetchcategorydata');

Route::get('/addsales', 'AddController@fetchproductcustomerdata')->name('fetchproductcustomerdata');

Route::get('/search/product', 'AddController@searchProduct')->name('searchProduct');

// ALL LIST
Route::get('/listcategory', 'listController@showcategory')->name('showcategory');

Route::get('/listproduct', 'listController@showproduct')->name('showproduct');

Route::get('/listcustomer', 'listController@showcustomer')->name('showcustomer');

Route::get('/listsupplier', 'listController@showsupplier')->name('showsupplier');

Route::get('/listsales', 'listController@showsales')->name('showsales');

Route::get('/listprofitloss', 'listController@listprofitloss')->name('listprofitloss');


// ALL SUBMIT 
Route::post('/submitproduct', 'AddProductController@saveproduct')->name('saveproduct');

Route::post('/submitcategory', 'AddCategoryController@savecategory')->name('savecategory');

Route::post('/submitcustomer', 'CustomerControllers@savecustomer')->name('savecustomer');

Route::post('/submitsupplier', 'SuppliersControllers@savesupplier')->name('savesupplier');

Route::post('/submitsales', 'SalesController@savesales')->name('savesales');

});

Route::middleware(['auth', 'isAdmin'])->group(function () {

// ALl UPDATE and DELELE
Route::get('/updatecategory', 'listcontroller@updatecategory')->name('updatecategory');

Route::get('/updateproduct', 'listcontroller@showupdateproduct')->name('showupdateproduct');

Route::get('/updatecustomers', 'listcontroller@updatecustomer')->name('updatecustomer');

Route::get('/updatesales', 'listcontroller@updatesales')->name('updatesales');

Route::get('/updatesuppliers', 'listcontroller@updatesuppliers')->name('updatesuppliers');

Route::get('/delete/{categoryid}', 'listcontroller@deletecategory')->name('deletecategory');

Route::get('/deletecustomer/{id}', 'listcontroller@deletecustomer')->name('deletecustomer');

Route::get('/deleteproduct/{id}', 'listcontroller@deleteproduct')->name('deleteproduct');

Route::get('/deletesales/{id}', 'listcontroller@deletesales')->name('deletesales');

Route::get('/deletesupplier/{id}', 'listcontroller@deletesupplier')->name('deletesupplier');

Route::get('/deleteuser/{userid}', 'listcontroller@deleteuser')->name('deleteuser');

Route::get('/edit/{categoryid}', 'listcontroller@editcategory')->name('editcategory');

Route::get('/editproduct/{productid}', 'listcontroller@showeditproduct')->name('showeditproduct');

Route::get('/editcustomer/{customerid}', 'listcontroller@showeditcustomer')->name('showeditcustomer');

Route::get('/editsupplier/{id}', 'listcontroller@showeditsupplier')->name('showeditsupplier');

Route::post('/edit', 'listcontroller@edit')->name('edit');

Route::post('/editproductform', 'listcontroller@editproductform')->name('editproductform');

Route::post('/submiteditcustomer', 'listcontroller@submiteditcustomer')->name('submiteditcustomer');

Route::post('/submiteditsupplier', 'listcontroller@submiteditsupplier')->name('submiteditsupplier');


//Add Update View Users & Roles
Route::get('/users', 'listController@showusers')->name('showusers');

Route::post('/adduser', 'usersController@adduser')->name('adduser');

Route::get('updaterole/{id}', 'RoleController@updaterole')->name('updaterole');

});


