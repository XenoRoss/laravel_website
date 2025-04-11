<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home.home');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('blog')->middleware('auth')->group(function () {
    Route::get('create', [PostController::class, 'create'])->name('blog.create'); // Secured blog post creation form
    Route::post('/', [PostController::class, 'store'])->name('blog.store'); // This will handle form submission and save the post
    Route::get('slug}/edit',[PostController::class, 'edit'])->name('blog.edit'); // Get the edit page for an existing blog post
    Route::put('{slug}', [PostController::class, 'update'])->name('blog.update'); // Update an existing blog post
    Route::delete('{slug}', [PostController::class, 'destroy'])->name('blog.destroy'); // Delete a blog post
});

Route::get('/about', function () {
    return view ('about');
})->name('about');

// Displays the newest blog post with a list view of the other blog posts
Route::get('/blog', [PostController::class, 'index'])->name('blog.index');

// Individual blog post view
Route::get('/blog/{slug}', [PostController::class, 'show'])->name('blog.show');

require __DIR__.'/auth.php';
