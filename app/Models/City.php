<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'state_id'
    ];

    // This method will return all the companies belonging to a City.
    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }

    // This function will handle the Polymorphism.
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}