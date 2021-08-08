<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;

class OneToManyController extends Controller
{
    public function read()
    {
        $countries = Country::with('states')->get();
        return view('one-to-many.read')->with('countries', $countries);
    }

    public function add() 
    {
        $countries = Country::get();
        return view('one-to-many.add')->with('countries', $countries);
    }

    public function create(Request $request) {

        $dataForm = [
            'country_id' => $request->country_id,
            'name' => $request->state_name,
            'initials' => $request->state_initials
        ];

        State::create($dataForm);

        $message = 'The state '.$request->state_name.' was added to the database successfully.';
        session(['message' => $message]);

        return redirect()->route('one-to-many-add');
    }
}
