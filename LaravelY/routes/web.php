<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\DashboardController;

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
    return view('home');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

route::get('/dashboard', [DashboardController::class, 'index'])
->name('dashboard')
->middleware('auth');



route::get('/users/{user:name}/posts', [UserPostController::class, 'index'])->name('users.posts');

route::post('/logout', [LogoutController::class, 'store'])->name('logout');

route::get('/posts', [PostController::class, 'index'])->name('posts');
route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
route::post('/posts', [PostController::class, 'store']);
route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.like');
route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'])->name('posts.like');

route::get('/logout', function(){
    return view('home');
})->name('home');


require __DIR__.'/auth.php';
