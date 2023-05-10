<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

class TestController extends Controller
{
    public function loginAs(Request $request, $userId)
    {
        $user = User::where('id', '=', $userId)->first();

        if (!$user) {
            return 'User ' . $userId . ' not found';
        }

        Auth::login($user);

        return 'Logged in as ' . $userId;
    }


    public function refreshDatabase(Request $request)
    {
        Artisan::call('migrate:fresh --seed');
        dump(Artisan::output());

        return 'Refresh database complete';
    }
}