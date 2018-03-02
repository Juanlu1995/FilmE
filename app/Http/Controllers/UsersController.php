<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller {

    private $user;

    public function __construct() {
        $this->middleware( function($request, $next){
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
    public function edit(Request $request) {
        return view('users.edit', ['user' => $this->user]);
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
