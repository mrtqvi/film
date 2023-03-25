<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SeriesRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Actor;
use App\Models\Series;
use App\Models\Teaser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allSeries = Series::latest()->paginate(10);
        return view('admin.series.index' , compact('allSeries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.series.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SeriesRequest $request , ImageService $imageService)
    {
        // get all request
        $inputs = $request->all();
        if ($request->has('poster')) {
            $imageService->setExclusiveDirectory("images" . DIRECTORY_SEPARATOR ."series" . DIRECTORY_SEPARATOR . "posters");
            $inputs['poster'] = $imageService->save($request->poster);
        }

        if ($request->has('wallpaper')) {
            $imageService->setExclusiveDirectory("images" . DIRECTORY_SEPARATOR ."series" . DIRECTORY_SEPARATOR . "wallpapers");
            $inputs['wallpaper'] = $imageService->save($request->wallpaper);
        }

        if ($request->filled('teaser'))
            $inputs['teaser_id'] = $this->attachTeaser($inputs['teaser']);

        $series = Series::create($inputs);

        $series->categories()->sync($inputs['categories']);

        return to_route('admin.series.agents' , $series->id)->with('toast-success', 'سریال جدید اضافه شد.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Series $series)
    {
        $categories = Category::all();
        return view('admin.series.edit' , compact('series' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SeriesRequest $request, Series $series , ImageService $imageService)
    {
        // get all request
        DB::transaction(function() use($request , $imageService , $series) {
            $inputs = $request->all();
            if ($request->has('poster')) {
                if (!empty($series->poster))
                    $imageService->deleteImage($series->poster);

                $imageService->setExclusiveDirectory("images" . DIRECTORY_SEPARATOR ."series" . DIRECTORY_SEPARATOR . "posters");
                $inputs['poster'] = $imageService->save($request->poster);
            }

            if ($request->has('wallpaper')) {
                if (!empty($series->wallpaper))
                    $imageService->deleteImage($series->wallpaper);
                $imageService->setExclusiveDirectory("images" . DIRECTORY_SEPARATOR ."series" . DIRECTORY_SEPARATOR . "wallpapers");
                $inputs['wallpaper'] = $imageService->save($request->wallpaper);
            }

            if ($request->filled('teaser'))
                $inputs['teaser_id'] = $this->attachTeaser($inputs['teaser']);


                $series->update($inputs);

                $series->categories()->sync($inputs['categories']);
        });

        return to_route('admin.series.agents' , $series->id)->with('toast-success', 'سریال ویرایش شد.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Series $series)
    {

        $series->favorites()->delete();
        $series->episodes()->delete();
        $series->sliders()->delete();
        $series->delete();

        return back()->with('toast-success' , 'سریال حذف شد');
    }

    private function attachTeaser($teaserPath)
    {
        $teaser = Teaser::where('teaser', $teaserPath)->first();
        return $teaser ? $teaser->id : null;
    }

    public function agentsView(Series $series)
    {
        return view('admin.agents' , [ 'item' => $series ,'factors' => $series->factors ?? collect([]) , 'actors' => Actor::all()]);
    }

    public function status(Series $series)
    {
        $series->status = $series->status == 0 ? 1 : 0;
        $result = $series->save();
        if ($result) {
            if ($series->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }
}
