<?php

namespace App\Http\Controllers;

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

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
     * @param  User user
     * @return \Illuminate\Http\Response
     */
    public function show($username) {
        $user = User::where('username', $username)->first();

        $reviews = $user->reviews;

        return view('users.show', ['user' => $user, 'reviews' => $reviews]);
    }


    /**
     * Display the user's profile.
     *
     * @param  User user
     * @return \Illuminate\Http\Response
     */
    public function profile(Request $request) {
        $user = $request->user();
        $reviews = $user->reviews;

        return view('users.profile', ['user' => $user, 'reviews' => $reviews]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit() {
//        dd($request);
        return view('users.edit', ['user' => $this->user]);
    }

    /**
     * Update the specified resource in storage.
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
    public function destroy($id) {
        //
    }
}
