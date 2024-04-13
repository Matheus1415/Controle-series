<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

class TemporadaController extends Controller
{

    public function index(Series $series)
    {
        $temporada = $series->temporadas()->with('episodes')->get();
        return view('temporada.index')->with('seasons', $temporada)->with('series', $series);
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
