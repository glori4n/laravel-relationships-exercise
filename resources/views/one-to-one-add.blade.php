@extends('layout')
@section('content')
    <title>One to One</title>
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
        <a href="{{ route('one-to-one-read') }}"><small>See Entries</small></a>
        <h2 class="mt-4">Add Country</h2>
        <form  action="{{ route('one-to-one-create') }}" method="POST" style="display:inline-block">
        @csrf
        <div class="form-group mb-4">
            <label for="">Country Name</label>
            <input type="text" class="form-control" name="country_name">
        </div>
        <div class="form-group mb-4">
            <label for="exampleInputPassword1">Country Latitude</label>
            <input type="text" class="form-control" name="latitude">
        </div>
        <div class="form-group mb-4">
            <label for="exampleInputPassword1">Country Longitude</label>
            <input type="text" class="form-control" name="longitude">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection