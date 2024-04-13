<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    use HasFactory;
    protected $fillable = ['numero'];


    public function series()
    {
        //Uma temporada pertence a uma series
        return $this->belongsTo(Series::class);
    }

    public function episodio()
    {   
        //Um temporada possuir varios episodios
        return $this->hasMany(Episodio::class);
    }

}
