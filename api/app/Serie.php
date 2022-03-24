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
     * Na hora de cadastrar uma nova série
     * o nome que for enviado vai ser colocado
     * em caixa alta
     */
    public function setNomeAttribute($valor){
        $this->attributes['nome'] = mb_strtoupper($valor);
    }
}
