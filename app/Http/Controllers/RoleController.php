<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

use App\User;

class RoleController extends Controller
{

    public function updaterole($id)

    {
        $data = DB::table('users')
                ->select('role')
                ->where('id','=',$id)
                ->first();

        if($data->role == '1')
        {
            $updatedrole = '0';
        }else{
            $updatedrole = '1';            
        }

        $values = array('role'=> $updatedrole);
        DB::table('users')->where('id',$id)->update($values);
        return redirect('users')->with('success','User Role Has Been Changed Successfully');
    }

    
}
