<?php

namespace App\Http\Controllers;

use App\Serie;

class SeriesController extends BaseController
{
    public function __construct() {
        $this->classe = Serie::class;
    }

    /**
     * Sobrescrevi o método (show) para testar metodo 
     * que foi criado (getNomeMaiusculoAttribute)
     */
    public function show(int $id)
    {
        $recurso = $this->classe::find($id);
        $status = (!is_null($recurso)) ? 200 : 204;
        $recurso->nome_caixa_alta = $recurso->nome_maiusculo;
        return response()->json($recurso, $status);
    }
}
