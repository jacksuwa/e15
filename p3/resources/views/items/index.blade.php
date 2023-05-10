@extends('layouts/main')

@section('head')
    <link href='/css/pages/table-design.css' rel='stylesheet'>
@endsection

@section('title')
    All Items
@endsection


@section('content')
    <h1 test='all-items-heading'>All Items</h1>

    <a class='link' href='/items/create'>
        <h4> Add new item </h4>
    </a>
    <a href='/items/archive'>
        <h4> Archive </h4>
    </a>
    <table>
        <thead>
            <tr>
                <th>Item Id</th>
                <th>Item Name</th>
                <th>Unit Price ($)</th>
            </tr>
        </thead>
        @foreach ($items as $item)
            <tbody>
                <tr>
                    <td> {{ $item->id }}</td>
                    <td> <a test='item-link' href='/items/{{ $item->id }}'>{{ $item->name }} </a></td>
                    <td> {{ $item->price }}</td>
                    <td>
                        <a href='/items/{{ $item->id }}/edit'>
                            <button>Edit</button>
                        </a>
                    </td>
                    <td>
                        <a href='/items/{{ $item->id }}/delete'>
                            <button>Delete</button>
                        </a>

                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
@endsection
