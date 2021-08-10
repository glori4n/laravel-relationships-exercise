<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable =[
        'name'
    ];

    // This method will return all the companies belonging to a City.
    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }
}
