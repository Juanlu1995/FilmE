<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contribute extends Model
{
    protected $fillable = ['name', 'lastName','birth_date', 'nacionality'];

    public function films(){
        return $this->belongsToMany(Film::class);
    }
}
