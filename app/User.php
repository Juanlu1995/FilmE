<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

/**
 * Son los usuarios de nuestra aplicación
 *
 * Class User
 * @package App
 */
class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name','username','email', 'phone','website','about','password','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function films(){
        return $this->hasMany(Film::class);
    }


    public function reviews(){
        return $this->hasMany(Review::class);
    }


    public function filmsSee(){
        return $this->belongsToMany(Film::class, 'users_see', 'user_id', 'film_id');
    }


    public function seeFilm(Film $film){
        return $this->filmsSee->contains($film);
    }
}
