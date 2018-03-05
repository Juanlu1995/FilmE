<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Representa las visitas que se han hecho a una película.
 *
 * Class View
 * @package App
 */
class View extends Model {
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function film() {
        return $this->belongsTo(Film::class);
    }
}
