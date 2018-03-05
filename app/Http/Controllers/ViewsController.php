<?php

namespace App\Http\Controllers;

use App\Film;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ViewsController extends Controller
{
    /**
     * El métodos nos devuelve en formato JSON el número de visitas que ha tenido una película y
     * cúando han sido efectuadas
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|static
     */
    public function getFilmViews(Request $request) {
        if (request()->ajax()) {
            $views = Film::where('id',$request->input('id'))->firstOrFail()->views;
            return JsonResponse::create($views);
        }else{
            return redirect('/');
        }
    }
}
