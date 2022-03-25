<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    // public $table = "series";
    public $timestamps = false;
    protected $fillable = ['nome'];
    /**
     * Quando usar paginação o valor padrão vai ser 5
     * mas na url caso queria mudar o valor padrão
     * ex: url?page=1&per_page=2
     * se variavel $perPage for comentada ou não existir o valor 
     * padrão usado pelo o ORM é de 15 itens por página
     */
    protected $perPage = 5;
    protected $appends = ['links'];
    protected $hidden = ['episodios'];

    public function episodios()
    {
        return $this->hasMany(Episodio::class);
    }

    public function getLinksAttribute(): array
    {
        $episodios = $this->episodios->map(function(Episodio $episodio){
            return "/api/episodios/{$episodio->id}";
        });
        return [
            'self' => "/api/series/{$this->id}",
            'episodios' => [
                "album" => "/api/series/{$this->id}/episodios",
                "lista" => $episodios
            ],
        ];
    }
}
