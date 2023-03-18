<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
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
}