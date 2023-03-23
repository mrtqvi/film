<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Image\ImageService;
use App\Models\Episode;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Series $series): View
    {
        return view('admin.series.episode.index', compact('series'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Series $series): View
    {
        $episodes = Series::with('episodes')->find($series->id)->episodes;
        // get episode and season
        $season = $episodes->last()->season ?? 1;

        $episode = $episodes->where('season' , $season)->count() + 1;


        return view('admin.series.episode.create', compact('series', 'episode', 'season'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Series $series , ImageService $imageService): RedirectResponse  
    {
        $validated = $request->validate([
            'title' => 'required|min:2|max:300',
            'image' => 'required|image|min:2|max:2048',
            'season' => 'nullable|numeric|min:1|max:30',
            'description' => 'nullable|min:2|max:2000',
        ]);

        $imageService->setExclusiveDirectory("images" . DIRECTORY_SEPARATOR . "series" . DIRECTORY_SEPARATOR .'episodes');
        $validated['image'] = $imageService->save($request->image);

        $validated['season'] = $validated['season'] ?? Episode::latest()->first()->season;

        $episode = $series->episodes()->create($validated);

        return to_route('admin.episodes.edit' , [$series->id , $episode->id])->with('toast-success', 'اپیزود جدید اضافه شد');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Series $series , Episode $episode) : View
    {
        $episodes = Series::with('episodes')->find($series->id)->episodes;
        // get episode and season
        $season = $episodes->last()->season ?? 1;

        return view('admin.series.episode.edit', compact('series', 'episode', 'season'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Series $series , Episode $episode , ImageService $imageService) : RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|min:2|max:300',
            'image' => 'nullable|image|min:2|max:2048',
            'season' => 'nullable|numeric|max:30',
            'description' => 'nullable|min:2|max:2000',
        ]);

        if ($request->has('image')) {
            if (!empty($episode->image))
                $imageService->deleteImage($episode->image);

            $imageService->setExclusiveDirectory("images" . DIRECTORY_SEPARATOR ."series" . DIRECTORY_SEPARATOR . "episodes");
            $validated['image'] = $imageService->save($request->image);
        }

        $episode->update($validated);

        return to_route('admin.episodes.index' , $series->id)->with('toast-success', 'اپیزود ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}