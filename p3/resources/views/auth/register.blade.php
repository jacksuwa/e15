@extends('layouts/main')

@section('title')
    Registration Page
@endsection

@section('head')
    <link href='/css/pages/login.css' rel='stylesheet'>
@endsection

@section('content')
    <div class="login-form">
        <h2>Register to Become a User</h2>

        Already have an account? <a href='/login'> Users Login Here!</a>

        <form method='POST' action='/register'>
            {{ csrf_field() }}

            <label for='name'>Name</label>
            <input test='name-input' class='input-type' id='name' type='text' name='name'
                value='{{ old('name') }}' autofocus>
            @include('includes.error-field', ['fieldName' => 'name'])

            <label for='email'>E-Mail Address</label>
            <input test='email-input' class='input-type' id='email' type='email' name='email'
                value='{{ old('email') }}'>
            @include('includes.error-field', ['fieldName' => 'email'])

            <label for='password'>Password (min: 8)</label>
            <input test='password-input' class='input-type' id='password' type='password' name='password'>

            @include('includes.error-field', ['fieldName' => 'password'])

            <label for='password-confirm'>Confirm Password</label>
            <input test='password-confirm-input' class='input-type' id='password-confirm' type='password'
                name='password_confirmation'>

            <button test='register-button' type='submit' class='btn btn-primary'>Register</button>
        </form>
    </div>
    <hr>
@endsection
