<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDashboard extends Controller
{


    public function dashboard()
    {
        return view('user.dashboard');
    }


}
