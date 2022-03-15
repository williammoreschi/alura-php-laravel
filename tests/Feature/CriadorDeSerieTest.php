<?php

namespace Tests\Unit;

use App\Serie;
use App\Services\CriadorDeSerie;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CriadorDeSerieTest extends TestCase
{

    use RefreshDatabase;
    
    public function testCriaSerie()
    {
        $criadorDeSerie = new CriadorDeSerie();
        $nomeDaSerie = "Série de Teste";
        $serieCriada = $criadorDeSerie->criarSerie($nomeDaSerie, 1, 1);

        $this->assertInstanceOf(Serie::class, $serieCriada);
        $this->assertDatabaseHas('series', ['nome' => $nomeDaSerie]);
        $this->assertDatabaseHas(
            'temporadas',
            ['serie_id' => $serieCriada->id, 'numero' => 1]
        );
        $this->assertDatabaseHas('episodios', ['numero' => 1]);
    }
}
