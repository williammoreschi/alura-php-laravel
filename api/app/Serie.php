<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    // public $table = "series";
    public $timestamps = false;
    protected $fillable = ['nome'];

    public function episodios()
    {
        return $this->hasMany(Episodio::class);
    }

    /**
     * Exemplo de Mutator
     * O primeiro caractere de cada palavra 
     * sempre esteja com letra maiúscula.
     */
    public function setNomeAtrribute(string $valor)
    {
        $this->attributes['nome'] = mb_convert_case($valor, MB_CASE_TITLE);
    }

    /**
     * Exemplo de Accessor
     * Retornar o nome da série em caixa alta
     */
    public function getNomeMaiusculoAttribute(): string
    {
        return mb_strtoupper($this->nome);
    }
}
