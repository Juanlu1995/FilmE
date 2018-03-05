<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Representa una nacionalidad, un país.
 *
 * Class Nationality
 * @package App
 */
class Nationality extends Model
{
    protected $table = 'nationalities';

    protected $fillable = ['name'];

    public function film(){
        return $this->HasMany(Film::class);
    }
}
