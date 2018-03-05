<?php

namespace App\Http\Controllers;

use App\actor;
use App\Contribute;
use App\Film;
use App\Http\Requests\CreateFilmRequest;
use App\View;
use Illuminate\Http\Request;

class FilmsController extends Controller {


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view("films.create", []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * Extraemos en forma de array lo que serán los actores y directores le damos un formato
     * al string del nombre del actor/director para posteriormente hacer una búsqueda en la base de datos.
     * Si existe, tramformamos ese String en el Contribute encontrado y si no existe lo creamos.
     * Comprobamos el formato de la imagen (si es un url o un archivo) y lo guardamos.
     * Creamos la película y le damos la lista de actores y directores a la película.
     *
     * TODO nacionalidad y productores
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFilmRequest $request) {
        $vacio = "Empty";

        $actors = explode(",", $request->input('actors'));
        array_walk($actors, function (&$actor) {
            $actor = trim($actor);
        });
        $directors = explode(",", $request->input('directors'));
        array_walk($directors, function (&$director) {
            $director = trim($director);
        });

        $actors = array_diff($actors, array(""));
        array_walk($actors, function (&$actor) {
            $actor = trim($actor);
            $actor = Contribute::firstOrCreate(['name' => $actor]);
        });
        $directors = array_diff($directors, array(""));
        array_walk($directors, function (&$director) {
            $director = trim($director);
            $director = Contribute::firstOrCreate(['name' => $director]);
        });


        if ($image = $request->file('cover')) {
            $url = $image->store('cover', 'public');
        } else {
            $url = "https://picsum.photos/800/600/?" . mt_rand(1, 1000);
        }

        $film = Film::create([
            'user_id' => $request->user()->id,
            'name' => $request->input('name'),
            'synopsis' => $request->input('synopsis') ?: $vacio,
            'cover' => $url,
            'date' => $request->input('date'),
            'duration' => $request->input('duration') ?: "0",
            //todo Implementar category y productores.
            'rating' => $request->input('rating') ?: "0",
            //todo Que la nacionalidad, si no existe una real, sea el valor 1 = none;
            'nationality_id' => $request->input('country') ?: 1,

        ]);


        foreach ($actors as $actor) {
            $film->actors()->attach($actor);
        }
        foreach ($directors as $director){
            $film->directors()->attach($director);
        }

        return redirect('/films/show/' . $film->id);
    }

    /**
     * Display the specified resource.
     *
     * Creamos una nueva vista a la película en la cual guardamos el usuario logueado (si lo está),
     * la película visitada y la ip.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film, Request $request) {

        if ($film) {
            View::create([
                'film_id' => $film->id,
                'user_id' => $request->user() ? $request->user()->id : null,
                'ip' => $request->ip(),
            ]);
        }
        $film = $film->with(['actors','directors'])->firstOrFail();
        return view('films.show', [
            "film" => $film
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
