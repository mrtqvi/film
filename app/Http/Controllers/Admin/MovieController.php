<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\MovieRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Actor;
use App\Models\Category;
use App\Models\Movie;
use App\Models\Teaser;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $movies = Movie::latest()->paginate(10);
        return view('admin.movie.index' , compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $categories = Category::all();
        return view('admin.movie.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovieRequest $request , ImageService $imageService): RedirectResponse
    {
        // get all request
        $inputs = $request->all();
        if ($request->has('poster')) {
            $imageService->setExclusiveDirectory("images" . DIRECTORY_SEPARATOR ."movies" . DIRECTORY_SEPARATOR . "posters");
            $inputs['poster'] = $imageService->save($request->poster);
        }

        if ($request->has('wallpaper')) {
            $imageService->setExclusiveDirectory("images" . DIRECTORY_SEPARATOR ."movies" . DIRECTORY_SEPARATOR . "wallpapers");
            $inputs['wallpaper'] = $imageService->save($request->wallpaper);
        }

        if ($request->filled('teaser')) 
            $inputs['teaser_id'] = $this->attachTeaser($inputs['teaser']);

        $movie = Movie::create($inputs);

        $movie->categories()->sync($inputs['categories']);
        
        return to_route('admin.movies.agents' , $movie->id)->with('toast-success', 'فیلم جدید اضافه شد.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie): View
    {
        $categories = Category::all();
        return view('admin.movie.edit' , compact('movie' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MovieRequest $request, Movie $movie , ImageService $imageService): RedirectResponse
    {
        // get all request
        DB::transaction(function() use($request , $imageService , $movie) {
            $inputs = $request->all();
            if ($request->has('poster')) {
                if (!empty($movie->poster))
                    $imageService->deleteImage($movie->poster);

                $imageService->setExclusiveDirectory("images" . DIRECTORY_SEPARATOR ."movies" . DIRECTORY_SEPARATOR . "posters");
                $inputs['poster'] = $imageService->save($request->poster);
            }

            if ($request->has('wallpaper')) {
                $imageService->setExclusiveDirectory("images" . DIRECTORY_SEPARATOR ."movies" . DIRECTORY_SEPARATOR . "wallpapers");
                $inputs['wallpaper'] = $imageService->save($request->wallpaper);
            }

            if ($request->filled('teaser')) 
                $inputs['teaser_id'] = $this->attachTeaser($inputs['teaser']);

                
                $movie->update($inputs);
                
                $movie->categories()->sync($inputs['categories']);
        });

        return to_route('admin.movies.agents' , $movie->id)->with('toast-success', 'فیلم سینمایی ویرایش شد.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie): RedirectResponse
    {
        $movie->delete();
        return back()->with('toast-success' , 'فیلم مورد نظر حذف گردید.');
    }

    private function attachTeaser($teaserPath)
    {
        $teaser = Teaser::where('teaser', $teaserPath)->first();
        return $teaser ? $teaser->id : null;
    }

    public function agentsView(Movie $movie)
    {
        return view('admin.agents' , [ 'item' => $movie ,'factors' => $movie->factors ?? collect([]) , 'actors' => Actor::all()]);
    }

    public function status(Movie $movie)
    {
        $movie->status = $movie->status == 0 ? 1 : 0;
        $result = $movie->save();
        if ($result) {
            if ($movie->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }
}
