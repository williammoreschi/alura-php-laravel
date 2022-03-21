<?php

namespace App\Services;

use App\Serie;
use App\Temporada;
use Illuminate\Support\Facades\DB;

class CriadorDeSerie
{
    public function criarSerie(
        string $nome,
        int $qtd_temporadas,
        int $ep_por_temporada,
        string $path_image
    ): Serie {
        DB::beginTransaction();
        $serie = Serie::create(["nome" => $nome, 'capa' => $path_image]);
        $this->criarTemporadas($serie, $qtd_temporadas, $ep_por_temporada);
        DB::commit();
        return $serie;
    }

    private function criarTemporadas(
        Serie $serie,
        int $qtd_temporadas,
        int $ep_por_temporada
    ): void {
        for ($i = 1; $i <= $qtd_temporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);

            $this->criarEpisodios($temporada, $ep_por_temporada);
        }
    }

    private function criarEpisodios(Temporada $temporada, int $ep_por_temporada): void
    {
        for ($j = 1; $j <= $ep_por_temporada; $j++) {
            $temporada->episodios()->create(['numero' => $j]);
        }
    }
}
