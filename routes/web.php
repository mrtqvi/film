<?php

use App\Http\Controllers\Admin\EpisodeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
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
use App\Http\Controllers\SeriesController as AppSeriesController;
use App\Http\Controllers\MovieController as AppMovieController;
use App\Http\Controllers\CategoryController as AppCategoryController;
use App\Http\Controllers\CommentController as AppCommentController;
use App\Http\Controllers\FavoriteController;


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
        'sliders'   =>  SliderController::class,
        'comments'   =>  CommentController::class,
        'users'     =>  UserController::class
    ]);

    Route::resource('{series}/episodes' , EpisodeController::class);

    Route::post('/teaser' , TeaserController::class)->name('teaser.store');

    Route::get('series/{series}/agents' , [SeriesController::class , 'agentsView'])->name('series.agents');
    Route::get('movies/{movie}/agents' , [MovieController::class , 'agentsView'])->name('movies.agents');
    Route::post('factors' , FactorController::class)->name('factor.store');

    Route::get('sliders/{slider-top}/status', [SliderController::class, 'status'])->name('sliders.status');
    Route::get('series/{series}/status', [SeriesController::class, 'status'])->name('series.status');
    Route::get('movies/{movie}/status', [MovieController::class, 'status'])->name('movies.status');
    Route::get('comment/{comment}/is_approved', [CommentController::class, 'approved'])->name('comments.is_approved');

});

Route::get('/', function () {
    return view('app.index');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get("/", [HomeController::class, 'home'])->name('home');
Route::resource('series' , AppSeriesController::class)->parameters(['series' => 'series:slug'])->only('index' , 'show');
Route::resource('movies' , AppMovieController::class)->parameters(['movies' => 'movie:slug'])->only('index' , 'show');


Route::resource('categories' , AppCategoryController::class)->parameters(['categories' => 'category:slug'])->only('index' , 'show');
Route::get('search' , SearchController::class)->name('search');
Route::post('/comment' , AppCommentController::class)->name('comment.store');

Route::resource('my-favorite' , FavoriteController::class)->parameters(['my-favorite' => 'my-favorite:slug'])->only('index' , 'destroy');
Route::get('/add-to-favorite/series/{series:slug}' , [AppSeriesController::class, 'addToFavorite'])->name('series.add-to-favorite');
Route::get('/add-to-favorite/movies/{movies:slug}' , [AppMovieController::class, 'addToFavorite'])->name('movies.add-to-favorite');


