@extends('layouts/main')

@section('head')
    <link href='/css/pages/table-design.css' rel='stylesheet'>
@endsection

@section('title')
    Soft Deleted Items
@endsection

@section('content')
    <h1>Soft Deleted Items</h1>

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
                    <td> {{ $item->name }}</td>
                    <td> {{ $item->price }}</td>
                    <td>
                    <td>
                        <form method='POST' action='/items/{{ $item->id }}'>
                            {{ method_field('delete') }}
                            {{ csrf_field() }}
                            <button test='delete-button' type='submit'>Yes, delete it!</button>
                        </form>
                    </td>
                    <td>
                        <form method='POST' action='/items/{{ $item->id }}/restore'>
                            {{ csrf_field() }}
                            <button type='submit'>Restore</button>
                        </form>
                    </td>
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
@endsection
