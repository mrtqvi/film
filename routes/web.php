<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeaserController;
use App\Http\Controllers\Admin\ActorController;
use App\Http\Controllers\Admin\SeriesController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('admin')->as('admin.')->group(function () {
    Route::get('/' , AdminDashboardController::class)->name('index');
    Route::resources([
        'categories'=>  CategoryController::class,
        'series'    =>  SeriesController::class,
        'actors'    =>  ActorController::class,
    ] , ['except' => 'show']);
    Route::post('/teaser' , TeaserController::class)->name('teaser.store');
});