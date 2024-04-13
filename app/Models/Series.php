<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;
    protected $fillable = ['nome'];
    protected $with = ['temporadas'];

    public function Temporadas()
    {
        //Uma serie tem varias temporadas
        return $this->hasMany(Temporada::class, 'series_id');
    }

    public static function booted()
    {
        self::addGlobalScope('ordem', function(Builder $queryBuilder) {
            $queryBuilder->orderBy('nome');
        });
    }
    

}