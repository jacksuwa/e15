@extends('layouts/main')

@section('head')
    <link href='/css/pages/modify-form.css' rel='stylesheet'>
@endsection

@section('title')
    Add Customer
@endsection

@section('content')
    <div class='modify-form'>
        <h1> Add Customer</h1>
        <form method='post' action='/customers'>
            {{ csrf_field() }}

            <label>First Name</label>
            <input test='first-name-input' type='text' name='first_name' value='{{ old('first_name') }}'>
            @include('includes/error-field', ['fieldName' => 'first_name'])

            <label>Last Name</label>
            <input test='last-name-input' type='text' name='last_name' value='{{ old('last_name') }}'>
            @include('includes/error-field', ['fieldName' => 'last_name'])

            <label>Address</label>
            <input test='address-input' type='text' name='address' value='{{ old('address') }}'>
            @include('includes/error-field', ['fieldName' => 'address'])

            <label>Phone #</label>
            <input test='phone-no-input' type='text' name='phone_no' value='{{ old('phone_no') }}'>
            @include('includes/error-field', ['fieldName' => 'phone_no'])


            <button test='submit-button' type='submit'>Add</button>

        </form>

        <a href='/customers/'>
            <button>Back</button>
        </a>
        @if (count($errors) > 0)
            <div test='global-error-feedback'>
                Please correct the above errors.
            </div>
        @endif
    </div>
@endsection
