<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model {
    // Hacemos esto para que los campos dados no se pueden dar programáticamente.
    // views_counted se podrá poner programáticamente por si se hacen "trampas" al orden de las películas más interesadas actualmente.
    protected $guarded = ["id", "reviews_counted", "created_at", "updated_at",];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function categories() {
        return $this->belongsToMany(Category::class, 'category_film','film_id','category_id');
    }

    public function actors() {
        return $this->belongsToMany(Contribute::class,
            'actor_film',
            'film_id',
            'actor_id');
    }

    public function directors() {
        return $this->belongsToMany(Contribute::class,
            'director_film',
            'film_id',
            'director_id');
    }

    public function reviews() {
        return $this->belongsToMany(View::class);
    }

    public function views() {
        return $this->hasMany(View::class);
    }

    public function producers() {
        return $this->belongsToMany(Producer::class);
    }

    public function country(){
        return $this->belongsTo(Nationality::class);
    }
}
