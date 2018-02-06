<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model {
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function film() {
        return $this->belongsTo(Film::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }
}
