<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageController extends Controller
{
    public function welcome()
    {
        $searchResults = session('searchResults', null);


        return view('pages/welcome', [
            'searchResults' => $searchResults,

        ]);
    }

    public function contact()
    {
        return view('pages/contact');
    }
}