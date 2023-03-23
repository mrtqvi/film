<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use App\Models\Series;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class HomeController extends Controller
{

    public function home()
    {
        $sliders = Slider::latest()->take(8)->where('status', 1)->get();
        $series = Series::latest()->take(10)->get();

        $newFilms = collect();
        $latestMovies = Movie::where('status', 1)->latest()->orderBy('created_at' , 'desc')->limit(10)->get();
        $latestSeries = Series::where('status', 1)->latest()->orderBy('created_at' , 'desc')->limit(10)->get();
        $newFilms = $newFilms->merge($latestMovies);
        $newFilms = $newFilms->merge($latestSeries);
        $newFilms = $newFilms->sortByDesc('created_at')->take(10);

        $popularFilms = collect();
        $popularMovies = Movie::where('status', 1)->whereHas('user')->withCount('user')->limit(10)->get();
        $popularSeries = Series::where('status', 1)->whereHas('user')->withCount('user')->limit(10)->get();
        $popularFilms = $popularFilms->merge($popularMovies);
        $popularFilms = $popularFilms->merge($popularSeries);
        $popularFilms = $popularFilms->sortByDesc('user_count')->take(10);

        $mostComments = collect();
        $movies = Movie::where('status', 1)->whereHas('comments', function($query) {
            $query->approved();
            })->withCount('comments')->orderBy('comments_count', 'desc')->limit(10)->get();
        $series = Series::where('status', 1)->whereHas('comments', function($query) {
            $query->approved();
            })->withCount('comments')->orderBy('comments_count', 'desc')->limit(10)->get();
        $mostComments = $mostComments->merge($movies);
        $mostComments = $mostComments->merge($series);
        $mostComments = $mostComments->sortByDesc('comments_count')->take(10);


        return view('app.index', compact('sliders' , 'series' , 'mostComments' , 'latestMovies' , 'latestSeries' , 'newFilms' , 'popularFilms'));
    }

    public function show(Series $series): View
    {
        return view('app.series.show' , compact('series'));
    }

}
