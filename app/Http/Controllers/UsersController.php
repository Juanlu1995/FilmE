<?php

namespace App\Http\Controllers;

use App\Film;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller {

    private $user;

    public function __construct() {
        $this->middleware(function ($request, $next) {
            $this->user = auth()->user();

            return $next($request);
        });

        $this->user = auth()->user();
    }

    /**
     * Display the specified resource.
     *
     * @param  User user
     * @return \Illuminate\Http\Response
     */
    public function show($username) {
        $user = User::with('reviews.film')->where('username', $username)->firstOrFail();


        return view('users.show', ['user' => $user]);

    }


    /**
     * Display the user's profile.
     *
     * @param  User user
     * @return \Illuminate\Http\Response
     */
    public function profile(Request $request) {
        $user = $request->user();
        $user = User::with('reviews.film')->findOrFail($user->id);

        return view('users.profile', ['user' => $user]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit() {
        return view('users.edit', ['user' => $this->user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * Si no tenemos errores probamos de qué ruta provenimos y según la ruta editamos al usuario con
     * todos los valores dador o comprobamos, en el caso de las contraseñas, que no haya fallos. Si es así
     * devolvemos la vista con los fallos y si no editamos el usuario, lo guardamos y volvemos a la anterior vista con
     * un mensaje de que la edición se ha efectuado correctamente.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request) {

        $path = $request->path();

        if ($path == 'profile/edit' || $path == 'profile/edit/data') {
            $data = array_filter($request->all());
            $user = User::findOrFail($this->user->id);

            $user->fill($data);
        } elseif ($path == 'profile/edit/password') {

            if( ! Hash::check($request->get('current_password'), $this->user->password ) ){
                return redirect()->back()->with('error', 'La constraseña actual no es correcta');
            }

            if( strcmp($request->get('current_password'), $request->get('password')) == 0){
                return redirect()->back()->with('error', 'La nueva contraseña debe ser diferente de la antigua.');
            }

            $this->user->password = bcrypt($request->get('password'));

        } elseif ($path == 'profile/edit/about') {
            $data = array_filter($request->all());
            $user = User::findOrFail($this->user->id);

            $user->fill($data);
        }

        $user->save();

        return redirect('/'.$path)->with('updated_success', 'Los datos se han actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy() {
        $this->user->delete();

        return redirect('/');
    }


    /**
     * Hacemos que un usuario tenga marcada una película vista
     *
     * @param Film $film
     */
    public function userSee(Film $film){
        $user = User::findOrFail($this->user->id);
        $user->filmsSee()->attach($film);

        return redirect()->back();
    }


    /**
     * Hacemos que un usuario desmaque una pelicula que haya visto
     *
     * @param Film $film
     */
    public function userNotSee(Film $film){
        $user = User::findOrFail($this->user->id);
        $user->filmsSee()->detach($film);

        return redirect()->back();
    }
}
