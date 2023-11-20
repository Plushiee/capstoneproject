<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageUserController extends Controller
{
    // User Dashboard 
    public function userDashboard()
    {
        return view('user.dashboard');
    }
}
