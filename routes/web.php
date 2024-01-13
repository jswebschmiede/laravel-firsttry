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
    $posts = Post::with('user')->get();

    return view('home', [
        'posts' => $posts
    ]);
})->name("home");


Route::get('/register', function () {
    return view('register');
})->name('register');
Route::post('/register-account', [UserController::class, 'registerAccount']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Login
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [UserController::class, 'login']);

Route::get('/dashboard', function () {
    $posts = [];
    if (auth()->check()) {
        $posts = auth()->user()->posts()->latest()->get();
    }
    return view('dashboard', [
        'posts' => $posts
    ]);
})->name('dashboard');

Route::post('/create-post', [PostController::class, 'createPost'])->name('create-post');
