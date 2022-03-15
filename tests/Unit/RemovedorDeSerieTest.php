<?php

namespace Tests\Unit;

use App\Services\CriadorDeSerie;
use App\Services\RemovedorDeSerie;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RemovedorDeSerieTest extends TestCase
{
    use RefreshDatabase;

    /** @var Serie */
    private $serie;

    public function setUp(): void
    {
        parent::setUp();

        $criadorDeSerie = new CriadorDeSerie();
        $this->serie = $criadorDeSerie->criarSerie(
            'Serie de Teste',
            1,
            1
        );
    }

    public function testRemoverUmaSerie()
    {
        $this->assertDatabaseHas('series', ['id' => $this->serie->id]);

        $removedorDeSerie = new RemovedorDeSerie();
        $nomeDaSerieRemovida = $removedorDeSerie->removerSerie($this->serie->id);

        $this->assertIsString($nomeDaSerieRemovida);
        $this->assertEquals('Serie de Teste', $nomeDaSerieRemovida);
        $this->assertDatabaseMissing('series', ['id' => $this->serie->id]);
    }
}
