<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ActorController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FactorController;
use App\Http\Controllers\Admin\SeriesController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\TeaserController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CommentController;


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

Route::prefix('admin')->middleware(['auth' , 'admin'])->as('admin.')->group(function () {
    Route::get('/' , AdminDashboardController::class)->name('index');

    Route::resources([
        'categories'=>  CategoryController::class,
        'series'    =>  SeriesController::class,
        'movies'    =>  MovieController::class,
        'actors'    =>  ActorController::class,
        'sliders'    =>  SliderController::class,
        'comment'    =>  CommentController::class,
    ]);

    Route::post('/teaser' , TeaserController::class)->name('teaser.store');

    Route::get('series/{series}/agents' , [SeriesController::class , 'agentsView'])->name('series.agents');
    Route::get('movies/{movie}/agents' , [MovieController::class , 'agentsView'])->name('movies.agents');
    Route::post('factors' , FactorController::class)->name('factor.store');

    Route::get('sliders/{slider}/status', [SliderController::class, 'status'])->name('sliders.status');
    Route::get('comment/{comment}/is_approved', [CommentController::class, 'approved'])->name('comment.is_approved');

});

Route::get('/', function () {
    return view('app.index');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
