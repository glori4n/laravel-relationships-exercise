<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Company;
use Illuminate\Http\Request;

class ManyToManyController extends Controller
{
    public function read()
    {
        $companies = Company::get();
        return view('many-to-many.read')->with('companies', $companies);
    }

    public function add()
    {
        $cities = City::get();
        return view('many-to-many.add')->with('cities', $cities);
    }

    public function create(Request $request)
    {
        $dataForm = [
            'name' => $request->company_name
        ];

        // You will need to create a company first to get it's IP.
        $company = Company::create($dataForm);

        // The sync() method will sync on the pivot table both ids while creating the records.
        $company->cities()->sync($request->cities_id);

        $message = 'The company '.$request->company_name.' was added to the database successfully.';
        session(['message' => $message]);

        return redirect()->route('many-to-many-add');
    }
}