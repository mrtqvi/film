<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Series;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile.my-favorite');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteSeries(Series $series)
    {
        $user = auth()->user();
        $user->series()->detach($series->id);
        return redirect()->back()->with('alert', 'سریال با موفقیت از علاقه مندی ها حذف شد.');
    }

    public function deleteMovie(Movie $movie)
    {
        $user = auth()->user();
        $user->movie()->detach($movie->id);
        return redirect()->back()->with('alert', 'فیلم با موفقیت از علاقه مندی ها حذف شد.');
    }

}
