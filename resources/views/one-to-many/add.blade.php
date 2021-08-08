@extends('layouts.main')
@section('content')
    <title>One to Many</title>
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
        <a href="{{ route('one-to-many-read') }}"><small>See One to Many entries</small></a>
        <h2 class="mt-4">Add State</h2>
        <form  action="{{ route('one-to-many-create') }}" method="POST" style="display:inline-block">
        @csrf
        <div class="form-group mb-4">
            <label for="">Country Name</label>
            <select name="country_id">
                @foreach ($countries as $country)
                <option value="{{$country->id}}">{{$country->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-4">
            <label for="">State Name</label>
            <input type="text" class="form-control" name="state_name">
        </div>
        <div class="form-group mb-4">
            <label for="exampleInputPassword1">State Initials</label>
            <input type="text" class="form-control" name="state_initials">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection