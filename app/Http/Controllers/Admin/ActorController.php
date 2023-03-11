<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ActorRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Actor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actors = Actor::query()->latest();

        if ($keyword = request('search'))
            $actors->where('full_name', "LIKE", "%{$keyword}%");

        $actors = $actors->paginate(15);
        return view('admin.actors.index', compact('actors'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActorRequest $request , ImageService $imageService)
    {
        $inputs = $request->all();

        DB::transaction(function () use ($inputs, $imageService) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . "actors");
            $inputs['image'] = $imageService->save($inputs['image']);
            Actor::create($inputs);
        });

        return to_route('admin.actors.index')->with('toast-success', 'بازیگر ایجاد شد');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActorRequest $request,Actor $actor, ImageService $imageService)
    {
        DB::transaction(function () use ($request, $actor, $imageService) {
            $inputs = $request->all();
            if ($request->has('image')) {
                if (!empty($actor->image))
                    $imageService->deleteImage($actor->image);

                $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . "actors");
                $inputs['image'] = $imageService->save($inputs['image']);
            }
            $actor->update($inputs);
        });

        return to_route('admin.actors.index')->with('toast-success', 'تغییرات اعمال شد.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actor $actor,ImageService $imageService )
    {
        DB::transaction(function () use($actor, $imageService) {
            if (!empty($actor->image))
                $imageService->deleteImage($actor->image);

            // TODO
            $actor->delete();
        });

        return back()->with('toast-success', 'بازیگر حذف شد');
    }
}
