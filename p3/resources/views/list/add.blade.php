@extends('layouts/main')

@section('title')
    Add Item {{ $item->id }} - {{ $item->name }} to your item list
@endsection

@section('content')
    <h2>Add to your item's list</h2>
    <h3>{{ $item->id }} - {{ $item->name }}</h3>


    <form method='POST' action='/list/{{ $item->id }}/save'>

        {{ csrf_field() }}

        <p> <label for='comments'>COMMENT ON THIS ITEM:</label></p>
        <textarea class='comments-textarea' test='comments-textarea' name='comments'>{{ old('comments') }}</textarea>
        <br>
        <button type='submit' test='add-to-list-button'>Add to list</button>

    </form>
@endsection
