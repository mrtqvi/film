<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $movies = Movie::query()->where('status', 1);

        if (request('imdb')) {
            $movies->orderBy('imdb' , 'DESC');
        }

        if (request('most-comments')) {
            $movies->withCount('comments')->orderBy('comments_count' , 'DESC');
        }

        if (request('favorites')) {
            $movies->withCount('user')->orderBy('user_count' , 'DESC');
        }

        $movies = $movies->latest()->paginate(8);

        return view('app.movie.index', compact('movies'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie): View
    {
        return view('app.movie.show' , compact('movie'));
    }

    public function addToFavorite(Movie $movies)
    {
        if(Auth::check())
        {
            $movies->user()->toggle([Auth::user()->id]);
            if($movies->user->contains(Auth::user()->id)){
                return response()->json(['status' => 1]);
            }
            else{
                return response()->json(['status' => 2]);
            }
        }
        else{
            return response()->json(['status' => 3]);
        }
    }
}
