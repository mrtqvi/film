<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    public function index()
    {


        return view('app.episode.index');
    }
}
