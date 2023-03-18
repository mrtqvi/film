<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $categories = Category::all();
        return view('app.category.index', compact('categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category): View
    {
        $categories = Category::all();

        $category = Category::with('series' , 'movies')->where('id', $category->id)->first();

        $items = $category->movies->merge($category->series);

        return view('app.category.show', compact('category', 'categories', 'items'));
    }
}