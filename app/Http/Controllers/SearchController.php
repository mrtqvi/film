<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Series;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $keyword = request('search');
        if (empty($keyword) || strlen($keyword) < 3) {
            $results = collect([]);
        } else {

            $series = Series::published()->where('fa_title', 'LIKE', "%{$keyword}%")->orWhere('en_title', 'LIKE', "%{$keyword}%")->latest()->get();

            $movies = Movie::published()->where('fa_title', 'LIKE', "%{$keyword}%")->orWhere('en_title', 'LIKE', "%{$keyword}%")->latest()->get();

            $results = $series->merge($movies);
        }
        
        return view('app.search', compact('results', 'keyword'));
    }
}