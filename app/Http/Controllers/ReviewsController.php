<?php

namespace App\Http\Controllers;

use App\Film;
use App\Http\Requests\CreateReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Review;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource order by update date.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::with('film')->orderBy('updated_at', 'desc')->paginate(9);

        return view('reviews.reviews', ['reviews' => $reviews]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Film $film)
    {
        return view('reviews.form', ['film' => $film]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateReviewRequest $request)
    {

        $title = $request->get('title');
        $content = $request->get('content');
        $rating = $request->get('rating');
        $user = Auth::user()->id;
        $film = $request->get('film');

        $review = Review::create([
            'film_id' => $film,
            'user_id' => $user,
            'title' => $title,
            'content' => $content,
            'rating' => $rating
        ]);

        return redirect('/reviews/' . $review->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        return view('reviews.review', ['review' => $review]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        $film = Film::where('id', $review->film_id)->firstOrFail();


        return view('reviews.form', ['review' => $review, 'film' => $film]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        $data = array_filter($request->all());

        $review->fill($data);

        $review->save();

        return redirect('/reviews/'.$review->id)->with('updated_success', 'Los datos se han actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Muestra la lista de reviews de una película.
     *
     * @param Film $film
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function showFilmReviews(Film $film)
    {
        $reviews = $film->reviews()->paginate(9);

        return view('reviews.showFilmReviews', ['film' => $film, 'reviews' => $reviews]);
    }

    /**
     * Muestra la lista de reviews que ha hecho un usuario
     *
     * @param $username
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function showUserReviews($username)
    {
        $user = User::where('username', $username)->firstOrFail();

        $reviews = $user->reviews()->paginate(9);

        return view('reviews.showUserReviews', ['user' => $user, 'reviews' => $reviews]);
    }


    /**
     * Da la vista de la lista de reviews ordenadas por fecha de actualización para mostrárla asíncronamente.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function giveMeReviews()
    {
        if (request()->ajax()) {
            $reviews = Review::orderBy('updated_at', 'desc')->paginate(9);
            return View::make('reviewsList', array('reviews' => $reviews))->render();
        } else {
            return redirect('/');
        }
    }
}
