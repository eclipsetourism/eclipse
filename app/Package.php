<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
    	'name', 
        'slug', 
        'description', 
        'departs', 
        'returns', 
        'duration', 
        'adult_price', 
        'child_price'
    ];

    public function photos() {
        return $this->morphMany(Photo::class, 'imageable');
    }

    public function setNameAttribute($name) {
        $this->attributes['name'] = $name;
    	$this->attributes['slug'] = str_slug($name, '-');
    }
    
    public function user() {    
    	return $this->belongsTo(User::class);
    } 

    public function bookings() {
        return $this->belongsToMany(Booking::class, 'booking_details')
                    ->withPivot('adult_quantity', 'child_quantity', 'date', 'date_submit');
    }

}
