@extends('layouts/main')

@section('title')
    Login
@endsection

@section('head')
    <link href='/css/pages/login.css' rel='stylesheet'>
@endsection

@section('content')
    <div class='login-form'>
        <h1>Login</h1>




        <form method='POST' action='{{ route('login') }}'>


            {{ csrf_field() }}

            <label for='email'>E-Mail Address</label>
            <input test='email-input' class='input-type' id='email' type='email' name='email'
                value='{{ old('email') }}' autofocus>
            @include('includes.error-field', ['fieldName' => 'email'])

            <label for='password'>Password</label>
            <input test='password-input' class='input-type' id='password' type='password' name='password'>
            @include('includes.error-field', ['fieldName' => 'password'])

            <label>
                <input type='checkbox' name='remember' {{ old('remember') ? 'checked' : '' }}> Remember Me
            </label>
            <button type='submit' test='login-button'>Sign in</button>
        </form>
        <a href='/register/'>
            <button>Register</button>
        </a>
    </div>
    <hr>
@endsection
