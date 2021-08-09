<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;

class OneToManyController extends Controller
{
    public function read(Request $request)
    {
        if ($request->search_state) {
            $country_state = State::find($request->search_state)->country->name;
        } else {
            $country_state = null;
        }

        $countries = Country::with('states')->get();
        $states = State::with('country')->get();
        return view('one-to-many.read', ['countries' => $countries, 'states' => $states, 'country_state' => $country_state]);
        
    }

    public function add() 
    {
        $countries = Country::get();
        return view('one-to-many.add')->with('countries', $countries);
    }

    public function create(Request $request) 
    {
        
        $dataForm = [
            'name' => $request->state_name,
            'initials' => $request->state_initials
        ];

        Country::find($request->country_id)->states()->create($dataForm);

        $message = 'The state '.$request->state_name.' was added to the database successfully.';
        session(['message' => $message]);

        return redirect()->route('one-to-many-add');
    }
}
