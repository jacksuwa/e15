@extends('layouts/main')

@section('title')
    Wage Calculator- e15 Project 2
@endsection

@section('content')
    <form method='POST' action='/process'>

        {{ csrf_field() }}
        <h1>Wage Calculator - e15 Project 2</h1>
        <h3>Quick about the you:</h3>
        <fieldset>
            <label for='email'>Your email address:</label>
            <input type='text' name='email' id='email' value='{{ old('email') }}'>
        </fieldset>
        @if ($errors->get('email'))
            <div class='error'>{{ $errors->first('email') }}</div>
        @endif
        <fieldset>
            <label>Status:</label>
            <input type='radio' name='status' id='single' value='single'
                {{ old('status') == 'single' ? 'checked' : '' }}>
            <label for='single'>Single</label>

            <input type='radio' name='status' id='married' value='married'
                {{ old('status') == 'married' ? 'checked' : '' }}>
            <label for='married'>Married</label>
        </fieldset>
        @if ($errors->get('status'))
            <div class='error'>{{ $errors->first('status') }}</div>
        @endif
        <h3>Wage Calculator...</h3>
        <ul>
            <li>Include tax deduction</li>
            <li>The tax deduction is calculated at a flat 22 percent rate</li>
        </ul>

        </fieldset>
        <fieldset>
            <label for='wageRate'> Wage Per hour:</label>
            <input type="text" id='wageRate' name='wageRate' value='{{ old('wageRate') }}'>
        </fieldset>
        @if ($errors->get('wageRate'))
            <span class='error'>{{ $errors->first('wageRate') }}</span>
        @endif

        <fieldset>
            <label for='hours'>Hours Worked:</label>
            <input type='number' id='hours' name='hours' value='{{ old('hours') }}'>

            <label for='minutes'>Minutes Worked:</label>
            <input type='number' id='minutes' name='minutes' value='{{ old('minutes') }}'>
        </fieldset>
        @if ($errors->get('hours'))
            <span class='error'>{{ $errors->first('hours') }}</span>
        @endif
        @if ($errors->get('minutes'))
            <span class='error'>{{ $errors->first('minutes') }}</span>
        @endif

        <fieldset>
            <label for='deductTax'>Deduct Tax</label>
            <input type='checkbox' id='deductTax'name='deductTax' value='deductTax'
                {{ old('deductTax') == 'deductTax' ? 'checked' : '' }}>
        </fieldset>

        <button type='submit'>Calculate</button>
    </form>



    @if (!is_null($wage))
        <p>{{ $email }} is {{ $status }} and earnings: ${{ $wage }} </p>
    @endif
@endsection
