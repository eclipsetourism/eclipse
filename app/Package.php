<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
    	'name', 
        'slug', 
        'subtitle',
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

        $this->makeSlug($name);
    }

    public function makeSlug($name) {
        
        $this->attributes['slug'] = str_slug($name);

        $slug = str_slug($name);

        $latestSlug = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]*)?$'")
                        ->latest('id')
                        ->pluck('slug');

        if( $latestSlug ) {

            $pieces = explode('-', $latestSlug);

            $number = intval(end($pieces));

            $this->attributes['slug'] = $slug . '-' . ($number + 1);

        }
    }
    
    public function user() {    
    	return $this->belongsTo(User::class);
    } 

    public function bookings() {
        return $this->belongsToMany(Booking::class, 'booking_details')
                    ->withPivot('adult_quantity', 'child_quantity', 'date', 'date_submit');
    }

}
