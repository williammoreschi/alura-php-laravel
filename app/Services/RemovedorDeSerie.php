<?php

namespace App\Services;

use App\{Episodio, Serie, Temporada};
// use App\Events\SerieApagada;
use App\Jobs\ExcluirCapaSerie;
use Illuminate\Support\Facades\DB;

class RemovedorDeSerie{
    public function removerSerie(int $serieId): string{

        $nomeSerie = '';
        DB::transaction(function() use ($serieId,&$nomeSerie) {
            $serie = Serie::find($serieId);
            $serieObject = (object)$serie->toArray();
            $nomeSerie = $serie->nome;
            
            $this->removerTemporadas($serie);
            $serie->delete();

            //$evento = new SerieApagada($serieObject);
            //event($evento);
            ExcluirCapaSerie::dispatch($serieObject);
        });

        return $nomeSerie;
    }

    private function removerTemporadas(Serie $serie):void{
        $serie->temporadas->each(function(Temporada $temporada){
            $this->removerEpisodios($temporada);
            $temporada->delete();
        });
    }

    private function removerEpisodios(Temporada $temporada):void{
        $temporada->episodios->each(function(Episodio $episodio){
            $episodio->delete();
        });
    }
}