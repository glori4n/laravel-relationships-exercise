<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    // Since this method will only return a hasOne relation, its name needs to be in singular.
    public function location() 
    {
        // This method accepts extra parameters so you can specitfy the exact location if needed.
        return $this->hasOne(Location::class);
    }

    // Since this method fetches a one to Many relation, it needs to be in plural.
    public function states()
    {
        return $this->hasMany(State::class);
    }
}
