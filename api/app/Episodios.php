<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episodios extends Model
{
    public $timestamps = false;
    protected $fillable = ['temporada', 'numero', 'assistido'];

    public function serie()
    {
        return $this->belongsTo(Series::class);
    }
}
