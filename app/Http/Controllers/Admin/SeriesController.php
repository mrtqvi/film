<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SeriesRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Series;
use App\Models\Teaser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('admin.series.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SeriesRequest $request , ImageService $imageService)
    {
        // get all request
        DB::transaction(function() use($request , $imageService) {
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

            Series::create($inputs);
        });

        return to_route('admin.series.index')->with('toast-success', 'سریال جدید اضافه شد.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function attachTeaser($teaserPath)
    {
        $teaser = Teaser::where('teaser', $teaserPath)->first();
        return $teaser ? $teaser->id : null;
    }
}
