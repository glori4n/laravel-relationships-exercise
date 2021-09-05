@extends('layouts.main')
@section('content')
    <title>Polymorphic Relationships</title>
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
        <a href="{{ route('polymorph-read') }}"><small>See Polymorphic entries</small></a>
        <h2 class="mt-4">Add Commentary</h2>
        <form  action="{{ route('polymorph-create') }}" method="POST" style="display:inline-block">
        @csrf

        <label for="">Select an Element to Polymorph.</label>
        <div class="form-group">
            {{-- This select will handle the object selected, to be compared on the backend --}}
            <select name="object_selected" id="object_selected" oninput="elementValidation(this.value)">
                <option disabled selected value> -- Select an option -- </option>
                <option value="country">Country</option>
                <option value="city">City</option>
                <option value="state">State</option>
            </select>
        </div>

        {{-- This will show if the Country option is selected above --}}
        <div class="form-group" id="country_select" style="display:none">
            <select name="country" id="">
                @foreach ($countries as $country)
                    <option value="{{$country->id}}">{{$country->name}}</option>
                @endforeach
            </select>
        </div>

        {{-- This will show if the City option is selected above --}}
        <div class="form-group" id="city_select" style="display:none">
            <select name="city" id="">
                @foreach ($cities as $city)
                    <option value="{{$city->id}}">{{$city->name}}</option>
                @endforeach
            </select>
        </div>

        {{-- This will show if the State option is selected above --}}
        <div class="form-group" id="state_select" style="display:none">
            <select name="state" id="">
                @foreach ($states as $state)
                    <option value="{{$state->id}}">{{$state->name}}</option>
                @endforeach
            </select>
        </div>

        <label for="commentary">Commentary</label>
        <div class="form-group mb-4 mt-2">
            <textarea name="commentary" id="commentary" cols="30" rows="3"></textarea>
        </div>

        <input type="hidden" name="entry_type" id="entry_type">

        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

<!-- Ajax to fetch DB records. -->
<script type='text/javascript'>

    function elementValidation(str) {

        if (str === "country") {
            $("#country_select").show();
            $("#entry_type").val("country");
        } else {
            $("#country_select").hide();
        }

        if (str === "city") {
            $("#city_select").show();
            $("#entry_type").val("city");
        } else {
            $("#city_select").hide();
        }

        if (str === "state") {
            $("#state_select").show();
            $("#entry_type").val("state");
        } else {
            $("#state_select").hide();
        }
    }
</script>
@endsection