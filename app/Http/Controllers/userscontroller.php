<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class userscontroller extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[

            'fullname' => 'required',
            'email' => 'required',
            'contactnumber' => 'required',
        
        ]);
    }

    public function adduser(Request $request)
    {
  
      $name = $request->input('name');
      $email = $request->input('email');
      $password = $request->input('password');
  
      DB::insert('insert into users (name,email,password) values (?,?,?)' 
      , [$name,  $email, $password]);
      
      return redirect('users')->with('success','User Added Sucessfully');
    }
}
