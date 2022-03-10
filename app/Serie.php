<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    public $table = 'series';
    public $timestamps = false;
    protected $fillable = ['nome'];

    public function tempodaras()
    {
        return $this->hasMany(Temporada::class);
    }
}
