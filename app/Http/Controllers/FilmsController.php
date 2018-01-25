<?php

namespace App\Http\Controllers;

use App\Film;
use App\Http\Requests\CreateFilmRequest;
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
            'name' => $request->input('name'),
            'synopsis' => $request->input('synopsis') ?: $vacio,
            'cover' => $request->input('cover')?: "http://lorempixel.com/800/600/",
            'date' => $request->input('date'),
            'duration' => $request->input('duration')?: "0",
            'category' => $request->input('category')?: "Unassigned",
            'rating' => $request->input('rating')?: "0",
            'actors' => $request->input('actors')?: $vacio,
            'directors' => $request->input('directors')?: $vacio,
            'producer' => $request->input('producer')?: $vacio,
//            'reviews_counted'=> $request->input('reviews_counted'),
//            'views_counted'=> $request->input('views_counted'),
            'country' => $request->input('country')?: $vacio,

        ]);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $film = Film::where('id',$id)->get();

        return view('films.show',[
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
