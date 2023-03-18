<?php

namespace App\Http\Controllers;

use App\Models\Series;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{

    public function home()
    {
        $sliders = Slider::latest()->take(8)->where('status', 1)->get();

        $series = Series::latest()->take(10)->get();

        return view('app.index', compact('sliders' , 'series'));
    }

    public function show(Series $series): View
    {
        return view('app.series.show' , compact('series'));
    }

}
