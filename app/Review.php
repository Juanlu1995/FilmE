<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Representa una review que un usuario le hace a una película
 *
 * Class Review
 * @package App
 */
class Review extends Model {
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function film() {
        return $this->belongsTo(Film::class);
    }

    public function user(){
        return $this->belongsTo(User::class)->withTrashed();
    }
}
