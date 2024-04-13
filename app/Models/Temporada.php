<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    use HasFactory;

    public function series()
    {
        //Uma temporada pertence a uma series
        return $this->belongsTo(Series::class);
    }

    public function Episodio()
    {   
        //Um temporada possuir varios episodios
        return $this->hasMany(Episodio::class);
    }

}
