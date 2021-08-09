<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;

class HasManyThroughController extends Controller
{
    
    public function read()
    {
        $countries = Country::get();
        return view('has-many-through.read')->with('countries', $countries);
    }

    public function add()
    {
        $states = State::get();
        return view('has-many-through.add')->with('states', $states);
    }

    public function create(Request $request)
    {
        $dataForm = [
            'name' => $request->city_name
        ];

        State::find($request->state_id)->cities()->create($dataForm);

        $message = 'The city '.$request->state_name.' was added to the database successfully.';
        session(['message' => $message]);

        return redirect()->route('has-many-through-add');
    }
}
