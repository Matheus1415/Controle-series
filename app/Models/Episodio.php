<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function Temporada()
    {
        return $this->belongsTo(Temporada::class);
    }

}
