@extends('layouts.app')
@section('content')
<script src="{{ asset('js/cascadingdropdowndemo/script.js') }}"></script>

<div class="container d-flex align-items-center justify-content-center vh-100">

    <div class="col-4 ">
        <div class="form-group mb-3">
            <label for="country">Country</label>
            <select name="country" id="country" class="form-control form-control-sm">
                <option value="">Select Country</option>

                @foreach ($countries as $country)
                <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="state"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i></label>
            <select name="" id="state" class="form-control form-control-sm">
                <option value="">Select State</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="city">City</label>
            <select name="" id="city" class="form-control form-control-sm">
                <option value="">Select City</option>
            </select>
        </div>
    </div>

</div>

@endsection