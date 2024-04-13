<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;
    protected $fillable = ['nome'];

    public function Temporadas()
    {
        //Uma serie tem varias temporadas
        return $this->hasMany(Temporada::class, 'series_id');
    }
}