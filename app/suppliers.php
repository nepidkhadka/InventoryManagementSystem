<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class suppliers extends Model
{
    protected $table = "suppliers";
    protected $fillable = ['id','company','contactperson','contactnumber','address','status'];
}
