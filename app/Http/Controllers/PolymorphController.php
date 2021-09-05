<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\Comment;
use Illuminate\Http\Request;

class PolymorphController extends Controller
{
    public function read()
    {
        $entries = Comment::get();        
        return view('polymorph.read')->with('entries', $entries);
    }

    public function add()
    {
        $countries = Country::with('cities', 'states')->get();
        $cities = City::get();
        $states = State::get();
        return view('polymorph.add', ['countries' => $countries, 'cities' => $cities, 'states' => $states]);
    }

    public function create(Request $request)
    {
        if ($request->entry_type == "country") {
            $data = Country::find($request->country);
        }

        if ($request->entry_type == "city") {
            $data = City::find($request->city);
        }

        if ($request->entry_type == "state") {
            $data = State::find($request->state);
        }

        // The comments() method will handle the Polymorphism.
        $data->comments()->create([
            'description' => "New Comment ($data->name) ".date('Y-m-d H:i:s'),
            'commentary' => $request->commentary
        ]);

        $message = 'The entry was successfully added to the database.';
        session(['message' => $message]);

        return redirect()->route('polymorph-add');
    }
}
