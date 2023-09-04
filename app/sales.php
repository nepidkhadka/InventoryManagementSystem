<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sales extends Model
{

    protected $table = "sales";
    protected $fillable = ['id','product_id','customer_id','quantity','discount','total'];


    public function products()
    {
        return $this->belongsTo('App\products','product_id');
    }


    public function customers()
    {
        return $this->belongsTo('App\customers','customer_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    
}
