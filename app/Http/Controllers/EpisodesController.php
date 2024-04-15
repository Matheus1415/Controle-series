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
            'season' => $season,
            'messagemSucesso' => session('messagem.sucesso')
        ]);
    }
    

    public function update(Request $request, Season $season)
    {
        // Obtenha a lista de episódios assistidos do formulário
        $watchedEpisodes = $request->input('episodes', []);

        // Itere sobre todos os episódios da temporada e atualize a propriedade 'watched' com base nos episódios assistidos
        $season->episodes->each(function(Episode $episode) use($watchedEpisodes) {
            // Verifica se o ID do episódio está na lista de episódios assistidos
            $episode->watched = in_array($episode->id, $watchedEpisodes);
            $episode->save(); // Salva as alterações no episódio
        });

        return redirect()->back()->with('messagem.sucesso', 'Episódios atualizados com sucesso');
    }
}
