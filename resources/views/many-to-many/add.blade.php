@extends('layouts.main')
@section('content')
    <title>Many to Many</title>
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
        <a href="{{ route('many-to-many-read') }}"><small>See Many to Many entries</small></a>
        <h2 class="mt-4">Add Company</h2>
        <form  action="{{ route('many-to-many-create') }}" method="POST" style="display:inline-block">
        @csrf
        <label for="">Cities Name:</label>
        <div class="form-group mb-4">
            @foreach ($cities as $city)
                <input type="checkbox" name="cities_id[]" value="{{$city->id}}">
                <label for="cities_id">{{$city->name}}</label>
            @endforeach
        </div>
        <div class="form-group mb-4">
            <label for="">Company Name</label>
            <input type="text" class="form-control" name="company_name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection