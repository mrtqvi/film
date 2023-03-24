<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Movie;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    public function index(Episode $episode)
    {
        return view('app.series.episode.index' , compact('episode'));
    }
}
