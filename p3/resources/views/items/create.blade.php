@extends('layouts/main')

@section('title')
    Add an Item
@endsection

@section('head')
    <link href='/css/pages/modify-form.css' rel='stylesheet'>
@endsection

@section('content')
    <div class='modify-form'>
        <h1>Add an Item</h1>

        <form method='post' action='/items'>
            {{ csrf_field() }}
            <label>Name</label>
            <input test='name-input' type='text' name='name' value='{{ old('name') }}''>
            @include('includes/error-field', ['fieldName' => 'name'])

            <label> Price ($)</label>
            <input test='price-input' type='text' name='price' value='{{ old('price') }}'>
            @include('includes/error-field', ['fieldName' => 'price'])

            <button test='submit-button' type='submit'>Add</button>
        </form>

        <a href='/items/'>
            <button>Back</button>
        </a>

        @if (count($errors) > 0)
            <div test='global-error-feedback'>
                Please correct the above errors.
            </div>
        @endif
    </div>
@endsection
