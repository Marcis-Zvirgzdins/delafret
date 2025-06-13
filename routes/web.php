<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BookmarkController;

// Index faila atgriežšana
Route::get('/', function () {
    return view('index');
}) -> name('index');

// Reģistrēšanās
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Pieslēgšanās, izrakstīšanās
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');

    // Profila iestatījumu mainīšana
    Route::get('/profile/settings', [ProfileController::class, 'settings'])->name('profile.settings');
    Route::post('/profile/update', [ProfileController::class, 'updateProfilePicture'])->name('profile.update');
    Route::delete('/profile/remove', [ProfileController::class, 'removeProfilePicture'])->name('profile.remove');

    // Raksta izveidošana
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
});

// Raksta skats
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

// Sākuma lapas 4 jaunākie raksti
Route::get('/', function () {
    $latestArticles = \App\Models\Article::latest('created_at')->take(4)->get();
    return view('index', compact('latestArticles'));
})->name('index');

// Raksta komentāri
Route::post('/articles/{article}/comments', [CommentController::class, 'store'])->name('comments.store');

// Kategorijas skats
Route::get('/articles/category/{category}', [ArticleController::class, 'category'])->name('articles.category');

// Komentāra dzēšana
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

// Grāmatzīmes 
Route::post('/bookmarks/toggle', [BookmarkController::class, 'toggle'])->name('bookmarks.toggle')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
});

// Privātās atsauksmes publicēšana
Route::post('/articles/{article}/feedback', [FeedbackController::class, 'store'])->name('feedback.store')->middleware('auth');

// Raksta tulkošana
Route::get('/articles/{article_id}/translate', [ArticleController::class, 'translate'])->name('article.translate')->middleware('auth');

// Raksta rediģēšana un atjaunošana
Route::get('/articles/{article_id}/edit', [ArticleController::class, 'edit'])->name('article.edit')->middleware('auth');
Route::put('/articles/{article_id}/update', [ArticleController::class, 'update'])->name('article.update')->middleware('auth');