<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Representa la categoría a la cual pertenece una película
 *
 * Class Category
 * @package App
 */
class Category extends Model
{
    protected $table = "categories";

    protected $fillable = ['name', 'description'];

    public function user() {
        return $this->belongsToMany(Film::class);
    }
}
