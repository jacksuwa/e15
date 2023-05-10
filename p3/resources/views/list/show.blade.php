@extends('layouts/main')

@section('head')
    <link href='/css/list/show.css' rel='stylesheet'>
@endsection

@section('title')
    Your Item's List
@endsection

@section('content')

    @if ($items->count() == 0)
        <p test='no-items-message'>There are no items on your list.</p>
        <p><a href='/items'>Find items to add to your list.</a></p>
    @else
        @foreach ($items as $item)
            <div class='item'>
                <a href='/items/{{ $item->id }}'>
                    <h2> ID: {{ $item->id }} - {{ $item->name }} </h2>
                </a>

                {{-- Not working --}}
                @if ($item->customer)
                    <p> <b>Purchased by: </b> {{ $item->customer->first_name . ' ' . $item->customer->last_name }}</p>
                @endif


                {{-- use of  `$item->pivot` to show item to user relationship --}}
                <form method='POST' action='/list/{{ $item->id }}/update'>
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <textarea name='comments' test='comments-textarea-{{ $item->id }}'>{{ $item->pivot->comments }}</textarea>
                    <br>
                    <button type='submit' test='update-button-{{ $item->id }}'>Update
                        comments</button>
                </form>
                <a href='/items/{{ $item->id }}/delete'>
                    <button>Delete</button> </a>

                @include('includes/remove-from-list')
                <p>
                    Added {{ $item->pivot->created_at->diffForHumans() }}
                </p>
            </div>
        @endforeach
    @endif

@endsection
