<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    public $table = "temporadas";
    public $timestamps = false;
    public $fillable = ['numero'];

    public function episodios()
    {
        return $this->hasMany(Episodio::class);
    }

    public function serie(){
        return $this->belongsTo(Serie::class);
    }
}
