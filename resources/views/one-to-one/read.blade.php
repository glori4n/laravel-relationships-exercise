@extends('layouts.main')
@section('content')
    <title>One to One</title>
    <div class="mt-5" style="text-align: center">
        <a href="{{ route('one-to-many-add') }}"><small>Add new One to One entry</small></a>
        @if ($countries)
        <table id="myTable" class="mt-4 container table table-striped table-bordered table-sm" max-width="100%">
            <thead>
                <tr>
                    <th class="th-sm">Country Name (belongsTo)</th>
                    <th class="th-sm">Latitude (hasOne)</th>
                    <th class="th-sm">Longitude (hasOne)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($countries as $country)
                <tr>
                    <td>{{ $country['name'] }}</td>
                    <td>{{ $country['latitude'] }}</td>
                    <td>{{ $country['longitude'] }}</td>
                </tr>
                @endforeach                
            </tbody>
            </table>        
        @else
        There are no entries.
        @endif
    </div>
@endsection