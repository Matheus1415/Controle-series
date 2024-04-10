<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     
        $series = ['Naruto', 'One piece', 'Demon Slsyer', 'Bleach','Dragon Boll'];

        return view('series.index')->with('series', $series);
    }

    public function create()
    {
        return view('series.create');
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
