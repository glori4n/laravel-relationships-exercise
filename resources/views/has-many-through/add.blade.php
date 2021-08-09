@extends('layouts.main')
@section('content')
    <title>Has many Through</title>
    <div class="mt-5" style="text-align: center">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @elseif(Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
                {{ Session::forget('message') }}
            </div>
        @endif
        <a href="{{ route('has-many-through-read') }}"><small>See Has Many Through entries</small></a>
        <h2 class="mt-4">Add City</h2>
        <form  action="{{ route('has-many-through-create') }}" method="POST" style="display:inline-block">
        @csrf
        <div class="form-group mb-4">
            <label for="">State Name</label>
            <select name="state_id">
                @foreach ($states as $state)
                <option value="{{$state->id}}">{{$state->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-4">
            <label for="">City Name</label>
            <input type="text" class="form-control" name="city_name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection