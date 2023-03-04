<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageController extends Controller
{
    public function welcome()
    {
        return view('pages/welcome');
    }

    public function contact()
    {
        return view('pages/contact');
    }
}