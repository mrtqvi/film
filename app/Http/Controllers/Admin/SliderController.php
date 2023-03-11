<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SliderRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::query();

        if ($searchString = request('search'))
            $sliders->where('alt', "LIKE" , "%{$searchString}%");

        if (request('status'))
            $sliders->wherePublished();

        $sliders = $sliders->latest()->paginate(15);
        return view('admin.sliders.index' , compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request , ImageService $imageService)
    {

        DB::transaction(function () use($request , $imageService) {
            $inputs = $request->all();

            // save image
            if ($request->hasFile('image')) {
                $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . "content" . DIRECTORY_SEPARATOR . "slider");
                $inputs['image'] = $imageService->save($inputs['image']);
            }

            $slider = Slider::create($inputs);


        });


        return to_route('admin.sliders.index')->with('toast-success' , 'اسلایدر جدید اضافه شد');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit' , compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, Slider $slider, ImageService $imageService)
    {
        DB::transaction(function () use($request , $slider ,$imageService) {
            $inputs = $request->all();

            // save image
            if ($request->hasFile('image')) {
                if (!empty($slider->image))
                    $imageService->deleteImage($slider->image);

                $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . "content" . DIRECTORY_SEPARATOR . "sliders");
                $inputs['image'] = $imageService->save($inputs['image']);
            }


            $slider->update($inputs);
        });

        return to_route('admin.sliders.index')->with('toast-success' , 'تغییرات روی اسلایدر اعمال شد.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();

        return back()->with('cute-success', 'اسلاید حذف گردید.');
    }

    public function status(Slider $slider)
    {
        $slider->status = $slider->status == 0 ? 1 : 0;
        $result = $slider->save();
        if ($result) {
            if ($slider->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }
}
