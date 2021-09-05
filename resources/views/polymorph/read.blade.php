@extends('layouts.main')
@section('content')
    <title>Polymorphic Relationships</title>
    <div class="mt-5" style="text-align: center">
        <a href="{{ route('polymorph-add') }}"><small>Add new Polymorphic entry</small></a>
        @if ($entries)
        <table id="myTable" class="mt-4 container table table-striped table-bordered table-sm" max-width="100%">
            <thead>
                <tr>
                    <th class="th-sm">Description</th>
                    <th class="th-sm">Type</th>
                    <th class="th-sm">Commentary</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entries as $entry)
                <tr>
                    <td>{{ $entry->description }}</td>
                    <td>{{ str_replace("App\Models\\", "", $entry->commentable_type) }}</td>
                    <td>{{ $entry->commentary }}</td>
                </tr>
                @endforeach                
            </tbody>
            </table>        
        @else
        There are no entries.
        @endif
    </div>
@endsection