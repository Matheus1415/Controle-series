<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episodio;
use App\Models\Series;
use App\Models\Temporada;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Series::all();
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');

        return view('series.index', compact('series', 'mensagemSucesso'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {

        $serie = Series::create($request->all());
        $temporadas = [];
        for($i = 1 ;$i <= $request->temporadaQty; $i++){
            $temporadas[] =[
                'series_id' => $serie->id,
                'numero' => $i,
            ];
        }

        Temporada::insert($temporadas);

        $episodio = [];
        foreach($serie->temporadas as $temporada){
            for($e = 1; $e <= $request->episodioQty; $e++){
                $episodio[] = [
                    'temporada_id' => $temporada->id,
                    'numero' => $e,
                ];
            }
        }
        
        Episodio::insert($episodio);

        return redirect()->route('series.index')
            ->with('mensagem.sucesso', "Série '{$serie->nome}' adicionada com sucesso");
    }

    public function destroy(Series $series)
    {
        $nomeSerie = $series->nome;
        $series->delete();

        return redirect()->route('series.index')
            ->with('mensagem.sucesso', "Série '{$nomeSerie}' removida com sucesso");
    }

    public function edit(Series $series)
    {
        return view('series.edit')->with('serie', $series);
    }

    public function update(SeriesFormRequest $request, Series $series)
    {
        $series->fill($request->all());
        $series->save();

        return redirect()->route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' atualizada com sucesso");
    }
}
