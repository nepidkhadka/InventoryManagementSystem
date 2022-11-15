<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    protected $table = "reservations";
    protected $fillable = ['passengerid','busid','routesid','date','seatno'];

        public function passenger(): BelongsTo
        {
            return $this->hasMany(passenger::class);
        }

        public function route(): BelongsTo
        {
            return $this->belongsTo(routes::class, 'routesid');
        }

        public function bus(): BelongsTo
        {
            return $this->belongsTo(bus::class, 'busid');
        }
        
    
}
