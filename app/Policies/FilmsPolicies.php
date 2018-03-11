<?php

namespace App\Policies;

use App\User;
use App\film;
use Illuminate\Auth\Access\HandlesAuthorization;

class FilmsPolicies
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the film.
     *
     * @param  \App\User $user
     * @param  \App\film $film
     * @return mixed
     */
    public function view(User $user, film $film)
    {
        //
    }

    /**
     * Determine whether the user can create films.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the film.
     *
     * @param  \App\User $user
     * @param  \App\film $film
     * @return mixed
     */
    public function update(User $user, film $film)
    {
        return $user->id == $film->user_id;
    }

    /**
     * Determine whether the user can delete the film.
     *
     * @param  \App\User $user
     * @param  \App\film $film
     * @return mixed
     */
    public function delete(User $user, film $film)
    {
        return $user->id == $film->user_id;

    }
}
