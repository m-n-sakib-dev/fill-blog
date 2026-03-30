<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\UserBlogController;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    $props = [
        'canLogin'    => Route::has('login'),
        'canRegister' => Route::has('register'),
    ];

    if (auth()->check()) {
        $props['feed']       = Article::with(['user', 'category'])->latest()->limit(9)->get();
        $props['categories'] = Category::withCount('articles')->having('articles_count', '>', 0)->get();
    }

    return Inertia::render('Welcome', $props);
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/about', fn() => Inertia::render('About'))->name('about');
Route::get('/authors', [PublicController::class, 'authors'])->name('authors');
Route::get('/articles', [PublicController::class, 'articles'])->name('articles');

require __DIR__ . '/auth.php';

Route::get('/{sub_domain}', [UserBlogController::class, 'show'])->name('user.blog');
Route::get('/{sub_domain}/{id}', [UserBlogController::class, 'article'])->name('user.article');
