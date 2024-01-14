<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Post;

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
    $posts = Post::with('user')->latest()->get();

    return view('home', [
        'posts' => $posts
    ]);
})->name("home");

/* User Routes */
Route::get('/user/login', function () {
    return view('user.login');
})->name('login');
Route::get('/user/create', [UserController::class, 'index'])->name('register');
Route::post('user.create', [UserController::class, 'create'])->name('user.create');
Route::post('user.logout', [UserController::class, 'logout'])->name('user.logout');
Route::post('user.login', [UserController::class, 'login'])->name('user.login');

/* Protected Routes */
Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/post/create', [PostController::class, 'index'])->name('post.create');
    Route::get('/post/{post}/edit', function () {
        return view('post.edit', [
            'post' => Post::find(request()->post)
        ]);
    })->name('post.edit');
    Route::post('post.store', [PostController::class, 'store'])->name('post.store');
    Route::patch('/post/{post}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.destroy');
});
