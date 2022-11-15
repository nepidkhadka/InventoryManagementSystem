<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = "products";
    protected $fillable = ['id','name','quantity','buyingprice','sellingprice','categorieid','supplierid','date'];


    public function categories()
        {
            return $this->belongsTo('App\categories','categorieid');
        }
    
        public function suppliers()
        {
            return $this->belongsTo('App\suppliers','supplierid');
        }
    
}
        
