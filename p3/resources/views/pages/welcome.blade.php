@extends('layouts/main')

@section('title')
    Items
@endsection

@section('head')
@endsection

@section('content')
    @if (Auth::user())
        <h2>
            Hello {{ Auth::user()->name }}!
        </h2>
    @endif

    <div class='title'>
        <h2> Welcome to Item Inventory Management </h2>
    </div>
@endsection
