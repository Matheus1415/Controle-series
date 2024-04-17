<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Season;
use Illuminate\Http\Request;

class EpisodesController
{
    public function index(Season $season)
    {
        return view('episodes.index', [
            'episodes' => $season->episodes,
            'mensagemSucesso' => session('mensagem.sucesso'),
            'season' => $season,
        ]);
    }

    public function update(Request $request, Season $season)
    {
        $watchedEpisodes = $request->episodes;
        $season->episodes->each(function (Episode $episode) use ($watchedEpisodes) {
            $episode->watched = in_array($episode->id, $watchedEpisodes);
            $episode->save(); // Salvar cada episódio individualmente
        });
    
        return redirect()->route('episodes.index', $season->id)
            ->with('mensagem.sucesso', 'Episódios marcados como assistidos');
    }
    
}
