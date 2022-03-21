<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Serie extends Model
{
    public $table = 'series';
    public $timestamps = false;
    protected $fillable = ['nome','capa'];

    public function getImageUrlAttribute()
    {
        if($this->capa){
            return Storage::url($this->capa);
        }
        return Storage::url('images/no-image.jpg');
    }

    public function temporadas()
    {
        return $this->hasMany(Temporada::class);
    }
}
