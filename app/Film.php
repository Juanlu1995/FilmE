<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Representa una película.
 *
 * Class Film
 * @package App
 */
class Film extends Model {
    // Hacemos esto para que los campos dados no se pueden dar programáticamente.
    // views_counted se podrá poner programáticamente por si se hacen "trampas" al orden de las películas más interesadas actualmente.
    protected $guarded = ["id", "reviews_counted", "created_at", "updated_at",];

    public function user() {
        return $this->belongsTo(User::class)->withTrashed();
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
        return $this->hasMany(Review::class);
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

    public function getViewsCount(){
        return $this->views()->count();
    }
    public function getReviewsCount(){
        return $this->reviews()->count();
    }

    public function getCoverAttribute($cover){
        if( starts_with($cover, "https://")){
            return $cover;
        }

        return  Storage::disk('public')->url($cover);
    }


}
