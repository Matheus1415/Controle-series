<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Autenticador;
use App\Models\Series;

class SeasonsController extends Controller
{
    public function __construct()
    {
    }
    public function index($serieId)
    {
        $serie = Series::findOrFail($serieId);
        $seasons = $serie->seasons()->with('episodes')->get();
    
        return view('seasons.index')->with('seasons', $seasons)->with('series', $serie);
    }
    
}
