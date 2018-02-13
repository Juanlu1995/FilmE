<?php

namespace App\Http\Controllers;

use App\Film;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ViewsController extends Controller
{
    public function getFilmViews(Request $request) {
        if (request()->ajax()) {
            $views = Film::where('id',$request->input('id'))->first()->views;
            return JsonResponse::create($views);
        }else{
            return redirect('/');
        }
    }
}
