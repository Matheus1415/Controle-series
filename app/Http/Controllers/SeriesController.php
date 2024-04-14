<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Repositories\SeriesRepository;
use Illuminate\Http\Request;
use App\Models\Series;


class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $repository)
    {
        
    }
    public function index(Request $request)
    {
        $series = Series::all();
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');

        return view('series.index')->with('series', $series)
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request, SeriesRepository $repository)
    {
        $serie = $this->$repository->add($request);
    
        return redirect()->route('series.index')
            ->with('mensagem.sucesso', "Série '{$serie->nome}' adicionada com sucesso");
    }
    

    public function destroy(Series $series)
    {
        $series->delete();

        return redirect()->route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso");
    }

    public function edit(Series $series)
    {
        return view('series.edit')->with('serie', $series);
    }

    public function update(Series $series, SeriesFormRequest $request)
    {
        $series->fill($request->all());
        $series->save();

        return redirect()->route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' atualizada com sucesso");
    }
}
