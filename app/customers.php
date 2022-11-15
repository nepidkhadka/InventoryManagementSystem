<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customers extends Model
{
    protected $table = "customers";
    protected $fillable = ['id','firstname','lastname','address','phonenumber'];
}
