@extends('layouts/main')

@section('head')
    <link href='/css/pages/modify-form.css' rel='stylesheet'>
@endsection

@section('title')
    Edit Item
@endsection

@section('content')
    <div class='modify-form'>
        <h1>Edit Item</h1>

        <form action='/items/{{ $id }}' method='POST'>
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <label>Name</label>
            <input type='text' test='name-input' name='name' value='{{ old('name') ?? $name }}'>
            @include('includes/error-field', ['fieldName' => 'name'])

            <label>Price ($)</label>
            <input type='text' test='price-input' name='price' value='{{ old('price') ?? $price }}'>
            @include('includes/error-field', ['fieldName' => 'price'])


            <button type='submit' test='update-button'>Update</button>


        </form>
        <a href='/items/'>
            <button>Back</button>
        </a>
    </div>
@endsection
