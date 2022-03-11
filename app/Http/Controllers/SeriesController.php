<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use App\Services\CriadorDeSerie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()->orderBy('nome')->get();
        $mensagem = $request->session()->get('mensagem');
        return view('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request, CriadorDeSerie $criadorDeSerie)
    {

        $serie = $criadorDeSerie->criarSerie(
            $request->nome,
            $request->qtd_temporadas,
            $request->ep_por_temporada
        );

        $request->session()->flash(
            'mensagem',
            "Série {$serie->nome} e suas temporadas e episódios foram criadas com sucesso."
        );
        return redirect()->route('listar_serie');
    }

    public function destroy(Request $request)
    {
        Serie::destroy($request->id);
        $request->session()->flash(
            'mensagem',
            'Série removida com sucesso'
        );
        return redirect()->route('listar_serie');
    }
}
