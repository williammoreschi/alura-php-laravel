<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    // public $table = "episodios";
    public $timestamps = false;
    protected $fillable = ['temporada', 'numero', 'assistido'];

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }
}
