<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class passenger extends Model
{
    protected $table = "passengers";
    protected $fillable = ['firstname','lastname','address','city','phonenumber','email','status'];
    
    public function reservation()
    {
        
        return $this->belongsTo('App\reservation');
    }
}
