<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Mail\NovaSerie;
use App\Serie;
use App\Services\{CriadorDeSerie, EmailNovaSerie, RemovedorDeSerie};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function store(SeriesFormRequest $request, CriadorDeSerie $criadorDeSerie, EmailNovaSerie $enviarEmail)
    {

        $serie = $criadorDeSerie->criarSerie(
            $request->nome,
            $request->qtd_temporadas,
            $request->ep_por_temporada
        );

        $enviarEmail->enviarEmail($request);

        $request->session()->flash(
            'mensagem',
            "Série {$serie->nome} e suas temporadas e episódios foram criadas com sucesso."
        );
        return redirect()->route('listar_serie');
    }

    public function destroy(Request $request, RemovedorDeSerie $removedorDeSerie)
    {
    
        $nomeSerie = $removedorDeSerie->removerSerie($request->id);
        $request->session()->flash(
            'mensagem',
            "Série {$nomeSerie} removida com sucesso"
        );
        return redirect()->route('listar_serie');
    }

    public function editaNome(int $id, Request $request)
    {
        $serie = Serie::find($id);
        $serie->nome = $request->nome;
        $serie->save();
    }
}
