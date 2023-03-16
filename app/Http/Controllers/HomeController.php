<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function home()
    {
        $sliders = Slider::latest()->take(8)->where('status', 1)->get();


        return view('app.index', compact('sliders'));
    }

}
