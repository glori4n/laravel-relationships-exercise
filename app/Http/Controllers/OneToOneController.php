<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Location;

class OneToOneController extends Controller
{
    public function read() 
    {
        // As the hasOne relation can only be dealt with singularily (first() or find()) the solution was to pluck the country IDs then build an array off of that.
        $countries_obj = Country::with('location')->get();
        
        foreach ($countries_obj as $country) {
            $countries[] = 
            [
                // Uses the belongsTo relationship.
                'name' => $country->name,
                
                // Uses the hasOne relationship. 
                'latitude' => $country->location->latitude,
                'longitude' => $country->location->longitude
            ];
        }

        return view('one-to-one.read', ['countries' => $countries]);
    }

    public function add() 
    {
        return view('one-to-one.add');
    }

    public function create(Request $request) {

        $dataForm = [
            'name' => $request->country_name,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ];

        $created_country = Country::create($dataForm);
        $created_country->location()->create($dataForm);

        $message = 'The country '.$request->country_name.' was added to the database successfully.';
        session(['message' => $message]);

        return view('one-to-one-add');
    }
}
