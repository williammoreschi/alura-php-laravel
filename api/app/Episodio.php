<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    // public $table = "episodios";
    public $timestamps = false;
    protected $fillable = ['temporada', 'numero', 'assistido', 'serie_id'];

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    /** 
     * Quando for retornar o(s) episodio(s)
     * o valor de assistido será um boleano
    */
    public function getAssistidoAttribute($valor): bool
    {
        return $valor;
    }
}
