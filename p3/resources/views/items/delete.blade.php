@extends('layouts/main')

@section('content')
    <h1>Soft Delete Confirmation</h1>
    <p>Please note deleting an item moves it to archive</P>


    <form method='POST' action='/items/{{ $item->id }}'>
        {{ method_field('delete') }}
        {{ csrf_field() }}
        <button type='submit' test='confirm-delete-button'>Yes, Soft delete it!</button>
    </form>

    <p class='cancel'>
        <a href='/items/'>No, I changed my mind.</a>
    </p>
@endsection
