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
        $countries_id = Country::get()->pluck('id');

        foreach ($countries_id as $country_id) {
            $countries[] = 
            [
                // Uses the belongsTo relationship.
                'name' => Location::find($country_id)->country->name,
                
                // Uses the hasOne relationship. 
                'latitude' => Country::find($country_id)->location->latitude,
                'longitude' => Country::find($country_id)->location->longitude
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
