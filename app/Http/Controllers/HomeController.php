<?php

namespace App\Http\Controllers;

use App\Models\Series;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function home()
    {
        $sliders = Slider::with('series.actors')->latest()->take(8)->where('status', 1)->get();



        $series = Series::with('actors')->get();

        return view('app.index', compact('sliders' , 'series'));
    }

}
