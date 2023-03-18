<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $allSeries = Series::query()->where('status', 1);

        if (request('imdb')) {
            $allSeries->orderBy('imdb' , 'DESC');
        }

        $allSeries = $allSeries->latest()->paginate(8);
        return view('app.series.index', compact('allSeries'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Series $series): View
    {
        return view('app.series.show' , compact('series'));
    }

    public function addToFavorite(Series $series)
    {
        if(Auth::check())
        {
            $series->user()->toggle([Auth::user()->id]);
            if($series->user->contains(Auth::user()->id)){
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
