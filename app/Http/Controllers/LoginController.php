<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        return view('login.index');
    }

    public function store(Request $request)
    {
        if(!Auth::attempt($request->all())){
            return redirect('/')->back()->withErrors(['Usúario ou senha invalida']);
        }
    }
    
}
