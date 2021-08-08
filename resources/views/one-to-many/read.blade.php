@extends('layouts.main')
@section('content')
    <title>One to One</title>
    <div class="mt-5" style="text-align: center">
        <a href="{{ route('one-to-many-add') }}"><small>Add new One to Many entry</small></a>
        <table id="myTable" class="mt-4 container table table-striped table-bordered table-sm" max-width="100%">
            <thead>
                <tr>
                    <th class="th-sm">Country Name</th>
                    <th class="th-sm">States</th>
                    <th class="th-sm">Initials</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($countries as $country)
                    @foreach ($country->states as $state)
                    <tr>
                        <td>{{$country->name}}</td>
                        <td>{{$state->name}}</td>
                        <td>{{$state->initials}}</td>
                    </tr>  
                    @endforeach 
                @endforeach            
            </tbody>
            </table>        
    </div>
@endsection