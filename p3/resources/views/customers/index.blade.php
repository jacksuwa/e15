@extends('layouts/main')

@section('title')
    Customers
@endsection
@section('head')
    <link href='/css/pages/table-design.css' rel='stylesheet'>
@endsection
@section('content')
    <h1> Customers</h1>
    <a href='/customers/create'>
        <h4> Add Customer </h4>
    </a>

    <table>
        <thead>
            <tr>
                <th>Customer Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>Phone#</th>
            </tr>
        </thead>

        @foreach ($customers as $customer)
            <tbody>
                <tr>
                    <td>{{ $customer->id }}</a></td>
                    <td>{{ $customer->first_name }} </td>
                    <td>{{ $customer->last_name }} </td>
                    <td>{{ $customer->address }} </td>
                    <td>{{ $customer->phone_no }} </td>
                    <td>
                        <a href='/customers/{{ $customer->id }}/edit'>
                            <button>Edit</button>
                        </a>
                    </td>
        @endforeach
        </tr>
        </tbody>
    </table>
@endsection
