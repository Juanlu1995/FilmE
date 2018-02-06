<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producer extends Model
{
    protected $fillable = ['name'];

    public function film(){
        return $this->belongsToMany(Film::class);
    }
}
