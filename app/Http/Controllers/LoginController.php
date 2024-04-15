<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Season;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function index()
    {
        return view('login.index');
    }
    
}
