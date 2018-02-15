<?php

namespace App\Http\Controllers;

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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFilmRequest $request) {
        $vacio = "Empty";

        Film::create([
            'user_id' => $request->user()->id,
            'name' => $request->input('name'),
            'synopsis' => $request->input('synopsis') ?: $vacio,
            'cover' => $request->input('cover') ?: "http://lorempixel.com/800/600/",
            'date' => $request->input('date'),
            'duration' => $request->input('duration') ?: "0",
            //todo Implementar category, directores, productores y actores.
            'rating' => $request->input('rating') ?: "0",
            //todo Que la nacionalidad, si no existe una real, sea el valor 1 = none;
            'nationality_id' => $request->input('country') ?: 1,

        ]);
        return redirect('/films/show/' . Film::latest()->first()->id);
    }

    /**
     * Display the specified resource.
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
