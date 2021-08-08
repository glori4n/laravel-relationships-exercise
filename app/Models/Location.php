<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'latitude',
        'longitude'
    ];

    // Since this method will only return one relation, its name needs to be in singular.
    public function country() 
    {
        // This method accepts extra parameters so you can specitfy the exact location if needed.
        return $this->belongsTo(Country::class);
    }
}
