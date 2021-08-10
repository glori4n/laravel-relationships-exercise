@extends('layouts.main')
@section('content')
    <title>One to Many</title>
    <div class="mt-5" style="text-align: center">
        <a href="{{ route('many-to-many-add') }}"><small>Add new Many to Many entry</small></a>
        <table id="myTable" class="mt-4 container table table-striped table-bordered table-sm" max-width="100%">
            <thead>
                <tr>
                    <th class="th-sm">Company Name</th>
                    <th class="th-sm">Cities</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                <tr>
                    <td>{{$company->name}}</td>
                    <td>
                        {{-- This snippet will make it able to put a comma only on the last occurrence. --}}
                        @php
                        $out = array();
                        foreach ($company->cities as $city) {
                            array_push($out, $city->name);
                        }
                        echo(implode(', ', $out));
                        @endphp
                    </td>
                </tr>  
                @endforeach            
            </tbody>
            </table>        
    </div>
@endsection