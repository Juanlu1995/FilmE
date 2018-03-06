<?php

namespace App\Http\Controllers;

use App\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * Mostramos una lista de películas ordenadas por las visitas a la película
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::with('user','reviews')->withCount('views')->orderBy('views_count', 'desc')->paginate(9);
        return view('home', ['films' => $films]);
    }

    /**
     * Devolvemos una vista pra mostrarla por asíncronamete renderizando la vista de la lista de películas
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function giveMeFilms(){
        if (request()->ajax()){
            $films = Film::with('user')->withCount('views')->orderBy('views_count', 'desc')->paginate(10);
            return View::make('films.listFilms', array('films' => $films))->render();
        }else{
            return redirect('/');
        }
    }
}
