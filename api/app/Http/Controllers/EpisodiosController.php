<?php

namespace App\Http\Controllers;

use App\Episodio;
use Illuminate\Http\Request;

class EpisodiosController
{
    public function index()
    {
        return Episodio::all();
    }

    public function store(Request $request)
    {
        return response()
            ->json(
                Episodio::create(['nome' => $request->nome]),
                201
            );
    }

    public function show(int $id)
    {
        $serie = Episodio::find($id);
        $status = (!is_null($serie)) ? 200 : 204;
        return response()->json($serie, $status);
    }

    public function update(int $id, Request $request)
    {
        $serie = Episodio::find($id);
        if (is_null($serie)) {
            return response()->json(['erro' => 'Recurso não existente'], 404);
        }
        $serie->fill($request->all());
        $serie->save();
        return response()->json($serie, 200);
    }

    public function destroy(int $id)
    {
        $qtdeRecursosRemovidos = Episodio::destroy($id);
        if ($qtdeRecursosRemovidos === 0) {
            return response()->json(['erro' => 'Recurso não existente'], 404);
        }
        return response()->json('', 204);
    }
}
