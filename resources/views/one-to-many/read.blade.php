@extends('layouts.main')
@section('content')
    <title>One to Many</title>
    <div class="mt-5" style="text-align: center">
        <a href="{{ route('one-to-many-add') }}"><small>Add new One to Many entry</small></a>
        <table id="myTable" class="mt-4 container table table-striped table-bordered table-sm" max-width="100%">
            <thead>
                <tr>
                    <th class="th-sm">Country Name</th>
                    <th class="th-sm">States (hasMany)</th>
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

    <div class="mt-5 container">
        <form  action="{{ route('one-to-many-read-post') }}" method="POST" style="display:inline-block">
            @csrf
        <label>Retrieve inverse country by state:</label>
        @if ($states)
        <select name="search_state">
            @foreach ($states as $state)
            <option value="{{$state->id}}">{{$state->name}}</option>
            @endforeach
        </select>
        @endif
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="container">
        @if(@$country_state)
        <label>Searched state's country (A country can have Many states):</label>
        {{$country_state}}
        @endif
    </div>
@endsection