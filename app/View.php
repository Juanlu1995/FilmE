<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class View extends Model {
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function film() {
        return $this->belongsTo(Film::class);
    }
}
