<?php

namespace App\Http\Controllers;

use App\Temporada;
use Illuminate\Http\Request;

class EpisodiosController extends Controller
{
    public function index(Temporada $temporada)
    {
        $serie = $temporada->serie;
        $episodios = $temporada->episodios;
        return view('episodios.index',compact('serie','episodios','temporada'));
    }
}
