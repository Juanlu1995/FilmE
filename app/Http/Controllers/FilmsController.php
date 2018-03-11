<?php

namespace App\Http\Controllers;

use App\actor;
use App\Category;
use App\Contribute;
use App\Film;
use App\Http\Requests\CreateFilmRequest;
use App\Nationality;
use App\Policies\FilmsPolicies;
use App\Producer;
use App\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Integer;

class FilmsController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nationalities = Nationality::orderBy('name', 'desc')->get();
        $producers = Producer::orderBy('name', 'desc')->get();
        $categories = Category::orderBy('name', 'desc')->get();
        return view("films.form", [
            'nationalities' => $nationalities,
            'producers' => $producers,
            'categories' => $categories
        ]);
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFilmRequest $request)
    {
        $vacio = "Empty";

        $actors = Contribute::extractOrCreateByName($request->input('actors'));

        $directors = Contribute::extractOrCreateByName($request->input('directors'));

        $producer = Producer::findOrFail($request->input('producer'));

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
            'category_id' => $request->input('category') ?: "0",
            'rating' => $request->input('rating') ?: "0",
            'nationality_id' => $request->input('nationality') ?: 1,
            'producer_id' => $producer->id ?: 1
        ]);


        foreach ($actors as $actor) {
            $film->actors()->attach($actor);
        }
        foreach ($directors as $director) {
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
    public function show(Film $film, Request $request)
    {
        $film = Film::with('actors', 'directors')->where(['id' => $film->id])->firstOrFail();

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
    public function edit(Film $film)
    {
        $nationalities = Nationality::orderBy('name', 'desc')->get();
        $producers = Producer::orderBy('name', 'desc')->get();
        $categories = Category::orderBy('name', 'desc')->get();

        return view('films.form', [
            'film' => $film,
            'nationalities' => $nationalities,
            'producers' => $producers,
            'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Film $film
     * @return \Illuminate\Http\Response
     */
    public function update(CreateFilmRequest $request, Film $film)
    {

        if (Auth::user()->can('update', $film)) {

            $name = $request->input('name');
            $synopsis = $request->input('synopsis');
            if ($request->has('cover')) {
                if ($cover = $request->file('cover')) {
                    $url = $cover->store('cover', 'public');
                } else {
                    $url = "https://picsum.photos/800/600/?" . mt_rand(1, 1000);
                }
            }
            if ($request->has('date')) {
                $date = $request->input('date');
            }
            if ($request->has('duration')) {
                $duration = $request->input('duration');
            }
            if ($request->has('rating')) {
                $rating = $request->input('rating');
            }

            $nationality = $request->input('nationality');
            $producer = $request->input('producer');
            $category = $request->input('category');

            $film->name = $name;
            $film->synopsis = $synopsis;
            $film->cover = isset($url) ? $url : 'https://picsum.photos/800/600?image=' . mt_rand(0, 1000);
            $film->date = $date;
            $film->duration = $duration;
            $film->rating = $rating;
            $film->nationality_id = $nationality;
            $film->producer_id = $producer;
            $film->category_id = $category;

            $film->save();


            return redirect('/films/show/' . $film->id);

        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Film $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        $film->delete();

        return redirect('/');
    }
}
