<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Season;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{

    public function index(Season $season)
    {
        return view('episodes.index', [
            'episodes' => $season->episodes,
            'season' => $season
        ]);
    }
    
    public function update(Request $request, Season $season)
    {
        $watchedEpisodeIds = $request->input('watched_episodes', []); 
        $season->episodes->each(function (Episode $episode) use ($watchedEpisodeIds) {
            $episode->watched = in_array($episode->id, $watchedEpisodeIds); 
        });

        $season->save(); 

        return redirect()->back()->with('success', 'Status de episódios assistidos atualizado com sucesso');
    }
}
