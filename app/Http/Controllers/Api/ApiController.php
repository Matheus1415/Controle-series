<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Repositories\SeriesRepository;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    private SeriesRepository $seriesRepository;
    
    public function __construct(SeriesRepository $seriesRepository)
    {
        $this->seriesRepository = $seriesRepository;
    }

    public function index(Request $request)
    {
        if(!$request->has('nome')){
            return Series::paginate(5);
        }

        return Series::where('nome','LIKE','%'.$request->nome.'%')->get()->paginate(5);
    }

    public function store(SeriesFormRequest $request)
    {
        $series = Series::created($request);
        return response()->json($series, 200);
    }

    public function show(string $id)
    {
        $serie = Series::find($id)->with('seasons.episodes')->get();

        if($serie == null){
            return response()->json('Série não encontrada', 404);
        }

        return $serie;
    }


    public function update(SeriesFormRequest $request, Series $serie)
    {
        if($serie == null){
            return response()->json('Série não encontrada', 404);
        }
        $serie->fill($request->all());
        $serie->save();

        return $serie;
        
    }

    public function destroy(string $id)
    {
        if($id == null){
            return response()->json('Série não encontrada', 404);
        }
        Series::destroy($id);
        return response()->noContent();
    }


}
