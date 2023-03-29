<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Movie;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    public function index(Episode $episode)
    {
        $nextepisodes = Episode::where('series_id' ,$episode->series_id)->where('id' , ">" , $episode->id)->get();
        return view('app.series.episode.index' , compact('episode' , 'nextepisodes'));
    }
}
