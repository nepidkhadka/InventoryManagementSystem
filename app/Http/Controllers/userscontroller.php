<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\User;

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
      $password = bcrypt($request->input('password'));
      $role = ($request->input('role'));
  
      DB::insert('insert into users (name,email,role,password) values (?,?,?,?)' 
      , [$name,  $email,$role, $password]);
      
      return redirect('users')->with('success','User Added Sucessfully');
    }

   
}
