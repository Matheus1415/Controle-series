<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemporadaController extends Controller
{

    public function index($serie)
    {
        $temporadas = $serie->temporadas;
        return view('temporada.index')->with('temporadas', $temporadas);
    }
    

 
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
