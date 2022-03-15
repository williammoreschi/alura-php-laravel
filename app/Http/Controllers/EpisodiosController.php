<?php

namespace App\Http\Controllers;

use App\Episodio;
use App\Temporada;
use Illuminate\Http\Request;

class EpisodiosController extends Controller
{
    public function index(Temporada $temporada, Request $request)
    {
        $serie = $temporada->serie;
        $episodios = $temporada->episodios;
        $mensagem = $request->session()->get('mensagem');
        return view('episodios.index', compact('serie', 'episodios', 'temporada','mensagem'));
    }

    public function assistidos(Temporada $temporada, Request $request)
    {
        $assistidos = $request->episodio;
        
        $temporada->episodios->each(
            function (Episodio $episodio)
            use ($assistidos) {
                $episodio->assistido = ($assistidos) ? in_array($episodio->id, $assistidos) : false;
            }
        );
        $temporada->push(); // Envia todas as alteraçoes ocorridas;
        $request->session()->flash('mensagem',"Dados alerado com sucesso");
        return redirect()->back();
    }
}
