<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    public $table = "episodios";

    public function temporada()
    {
        return $this->belongsTo(Temporada::class);
    }
}
