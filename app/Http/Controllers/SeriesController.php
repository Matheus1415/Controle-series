<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{

    public function index(Request $request)
    {
        $series = Series::orderBy('nome')->get();
        $messagemSucesso = $request->session()->get('messagem.sucesso');

        $request->session()->forget('messagem.sucesso');

        return view('series.index')->with('series', $series)
                                   ->with('messagemSucesso', $messagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $serie = Series::create($request->all());

        return redirect()->route('series.index')->with('messagem.sucesso', "Série {$serie->nome} adicionada com sucesso");
    }
    
    public function destroy(Request $request, $id)
    {
        $serie = Series::findOrFail($id);
        $nomeSerie = $serie->nome;

        Series::destroy($id);
        return redirect()->route('series.index')->with('messagem.sucesso',"Série {$nomeSerie} removida com sucesso");
    }
    
    public function edit(Series $serie)
    {
        return view('series.edit')->with('serie',$serie);
    }
    
    public function update(Request $request, $id)
    {
        $serie = Series::findOrFail($id);
        $serie->update($request->all());
        return redirect()->route('series.index')->with('messagem.sucesso', "Série {$serie->nome} atualizada com sucesso");
    }
    
    
    public function show($id)
    {
        //
    }

}
