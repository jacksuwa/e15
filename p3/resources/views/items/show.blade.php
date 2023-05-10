@extends('layouts/main')

@section('head')
    <link href='/css/pages/table-design.css' rel='stylesheet'>
@endsection

@section('content')


    @if (!$item)
        Item is not found. <a href='/items'>Checkout all items...</a>
    @else
        <table>
            <thead>
                <tr>
                    <th>Item Id</th>
                    <th>Item Name</th>
                    <th>Unit Price ($)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> {{ $item->id }}</td>
                    <td> {{ $item->name }}</td>
                    <td> {{ $item->price }}</td>
                    <td>
                        <a href='/items/{{ $item->id }}/edit'>
                            <button test='edit-button' type='submit'>
                                Edit</button></a>
                    </td>
                    <td>
                        <a href='/items/{{ $item->id }}/delete'>
                            <button test='delete-button' type='submit'>
                                Delete</button></a>
                    </td>
                    @if ($onList)
                        <td>
                            @include('includes/remove-from-list')
                        </td>
                    @else
                        <td>
                            <a href='/list/{{ $item->id }}/add'>
                                <button test='add-to-list-button' type='submit'>
                                    Add to your item list</button></a>
                        </td>
                </tr>
    @endif

    </tbody>
    </table>
    @endif
@endsection
