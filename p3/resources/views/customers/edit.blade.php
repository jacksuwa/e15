@extends('layouts/main')

@section('title')
    Edit Customer
@endsection

@section('head')
    <link href='/css/pages/modify-form.css' rel='stylesheet'>
@endsection

@section('content')
    <div class='modify-form'>
        <h1> Edit Customer</h1>
        <form action='/customers/{{ $customer->id }}' method='POST'>
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <label>First Name</label>
            <input test='first-name-input' type='text' name='first_name'
                value='{{ old('first_name') ?? $customer->first_name }}'>
            @include('includes/error-field', ['fieldName' => 'first_name'])

            <label>Last Name</label>
            <input test='last-name-input' type="text" name='last_name'
                value='{{ old('last_name') ?? $customer->last_name }}'>
            @include('includes/error-field', ['fieldName' => 'last_name'])

            <label>Address</label>
            <input test='address-input' type='text' name='address' value='{{ old('address') ?? $customer->address }}'>
            @include('includes/error-field', ['fieldName' => 'address'])

            <label>Phone #</label>
            <input test='phone-no-input' type='text' name='phone_no'
                value='{{ old('phone_no') ?? $customer->phone_no }}'>
            @include('includes/error-field', ['fieldName' => 'phone_no'])


            <button type='submit' test='update-button'>Update</button>


        </form>
        <a href='/customers/'>
            <button>Back</button>
        </a>
    </div>
@endsection
