<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WageCalculatorController extends Controller
{
    public function welcome()
    {

        return view('wage-calculator/welcome', [
            'email' => session('email', null),
            'status' => session('status', null),
            'wage' => session('wage', null),
        ]);
    }

    public function process(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'status' => 'required',
            'wageRate' => 'required|numeric',
            'hours' => 'required|numeric|min:0|',
            "minutes" => 'required|numeric|min:0|max:60'
        ]);

        $email = $request->input('email', null);
        $status = $request->input('status', null);
        $wageRate = $request->input('wageRate', null);
        $hours = $request->input('hours', null);
        $minutes = $request->input('minutes', null);

        $wage = ($hours + $minutes / 60)  * $wageRate;

        if ($request->has('deductTax')) {
            $percentage = 22;
            $wage = $wage - ($percentage / 100) * $wage;
        }

        $wage = number_format($wage, 2, '.', '');

        return redirect('/')->with([
            'email' => $email,
            'status' => $status,
            'wage' => $wage
        ])->withInput();
    }
}