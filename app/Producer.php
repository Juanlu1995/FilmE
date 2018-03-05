<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Representa la productora de una película. Puede ser tanto una persona como una empresa.
 *
 * Class Producer
 * @package App
 */
class Producer extends Model
{
    protected $fillable = ['name'];

    public function film(){
        return $this->belongsToMany(Film::class);
    }
}
