<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model {
    // Hacemos esto para que los campos dados no se pueden dar programáticamente.
    // views_counted se podrá poner programáticamente por si se hacen "trampas" al orden de las películas más interesadas actualmente.
    protected $guarded = ["id", "reviews_counted", "created_at", "updated_at",];
}
