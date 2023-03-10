<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest();

        if ($keyword = request('search'))
            $categories->where('name', "LIKE", "%{$keyword}%");

        $categories = $categories->paginate(15);
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request, ImageService $imageService)
    {
        $inputs = $request->all();

        DB::transaction(function () use ($inputs, $imageService) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . "categories");
            $inputs['image'] = $imageService->save($inputs['image']);
            Category::create($inputs);
        });

        return to_route('admin.categories.index')->with('toast-success', 'دسته یندی ایجاد شد');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category, ImageService $imageService)
    {
        DB::transaction(function () use ($request, $category, $imageService) {
            $inputs = $request->all();
            if ($request->has('image')) {
                if (!empty($category->image))
                    $imageService->deleteImage($category->image);

                $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . "categories");
                $inputs['image'] = $imageService->save($inputs['image']);
            }
            $category->update($inputs);
        });

        return to_route('admin.categories.index')->with('toast-success', 'تغییرات روی دسته بندی اعمال شد.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category, ImageService $imageService)
    {
        DB::transaction(function () use($category, $imageService) {
            if (!empty($category->image))
                $imageService->deleteImage($category->image);

            // TODO
            $category->delete();
        });

        return back()->with('toast-success', 'دسته بندی حذف شد.');
    }
}