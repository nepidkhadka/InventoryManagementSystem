<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\buses;
use App\routes;
use App\updatebus;
use App\drivers;
use App\User;

class statuscontroller extends Controller
{
    public function routestatus($id)

    {
        $data = DB::table('routes')
                ->select('status')
                ->where('id','=',$id)
                ->first();

        if($data->status == '1')
        {
            $status = '0';
        }else{
            $status = '1';            
        }

        $values = array('status'=> $status);
        DB::table('routes')->where('id',$id)->update($values);
        return redirect('updateroutes')->with('success','Routes Status has been updated successfully');
    }

    public function busstatus($id)

    {
        $data = DB::table('buses')
                ->select('status')
                ->where('id','=',$id)
                ->first();

        if($data->status == '1')
        {
            $status = '0';
        }else{
            $status = '1';            
        }

        $values = array('status'=> $status);
        DB::table('buses')->where('id',$id)->update($values);
        return redirect('updatebus')->with('success','Bus Status has been updated successfully');
    }

    public function driverstatus($id)

    {
        $data = DB::table('drivers')
                ->select('status')
                ->where('id','=',$id)
                ->first();

        if($data->status == '1')
        {
            $status = '0';
        }else{
            $status = '1';            
        }

        $values = array('status'=> $status);
        DB::table('drivers')->where('id',$id)->update($values);
        return redirect('updatedrivers')->with('success','Driver Status has been updated successfully');
    }

    public function passengerstatus($id)

    {
        $data = DB::table('passengers')
                ->select('status')
                ->where('id','=',$id)
                ->first();

        if($data->status == '1')
        {
            $status = '0';
        }else{
            $status = '1';            
        }

        $values = array('status'=> $status);
        DB::table('passengers')->where('id',$id)->update($values);
        return redirect('updatepassenger')->with('success','Passenger Status has been updated successfully');
    }
}
