<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function contact()
    {
        return '<h1>Contact us at mail@bookmark.com</h1>';
    }
}