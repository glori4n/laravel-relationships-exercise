@extends('layouts.main')
@section('content')
    <title>Has Many Through</title>
    <div class="mt-5" style="text-align: center">
        <a href="{{ route('has-many-through-add') }}"><small>Add new Has Many Through</small></a>

        <table id="myTable" class="mt-4 container table table-striped table-bordered table-sm" max-width="100%">
            <thead>
                <tr>
                    <th class="th-sm">Country Name</th>
                    <th class="th-sm">City (hasManyThrough State::class)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($countries as $country)
                    @foreach ($country->cities as $city)
                    <tr>
                        <td>{{$country->name}}</td>
                        <td>{{$city->name}}</td>
                    </tr>  
                    @endforeach 
                @endforeach            
            </tbody>
            </table>  
    </div>
@endsection