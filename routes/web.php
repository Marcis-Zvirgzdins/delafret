<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;



Route::get('/', function () {
    return view('index');
}) -> name('index');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');

    Route::get('/profile/options', [ProfileController::class, 'options'])->name('profile.options');
    Route::post('/profile/update', [ProfileController::class, 'updateProfilePicture'])->name('profile.update');
    Route::delete('/profile/remove', [ProfileController::class, 'removeProfilePicture'])->name('profile.remove');

    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
});

Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/', function () {
    $latestArticles = \App\Models\Article::latest('published_at')->take(4)->get();
    return view('index', compact('latestArticles'));
})->name('index');