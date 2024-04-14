<?php

namespace App\Http\Controllers;

use App\Models\Series;
use App\Models\Season; 

class SeasonsController extends Controller
{
    public function index(Series $serie)
    {
        // Obter as temporadas relacionadas à série
        $seasons = $serie->seasons;

        return view('seasons.exibirTemporada')->with('seasons', $seasons)->with('series', $serie);
    }
}
