<?php

namespace App\Http\Controllers;

use App\Contribute;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ContributesController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $contributes = Contribute::orderBy('updated_at', 'desc')->paginate(9);

        return view('contributes.listContributes', ['contributes' => $contributes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug) {
        $contribute = Contribute::where('slug', $slug)->firstOrFail();
        return view('contributes.show', ['contribute' => $contribute]);
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

    /**
     * Nos devuelve una lista de Contributes en formato JSON.
     *
     * @param Request $request
     * @return JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function autocompleteAJAX(Request $request) {
        if ($request->ajax()) {

            $contributes = Contribute::all()->pluck('name');

            return new JsonResponse($contributes);
        }

        return redirect('/');
    }


}
