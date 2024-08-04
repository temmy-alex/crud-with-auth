<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function() {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::get('/posts/list', [PostController::class, 'index'])->name('posts.list');
    Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
    // Route::patch('/posts/update/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::put('/posts/update/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
    Route::delete('/posts/delete/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
});
