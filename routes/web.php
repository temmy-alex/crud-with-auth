<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestingController;
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

Route::get('/testing/show', [TestingController::class, 'index']);
Route::get('/page/show', [PageController::class, 'create'])->name('page.show');
Route::get('/page/show/name', [PageController::class, 'showName'])->name('page.showname');
Route::post('/page/view/name', [PageController::class, 'viewName'])->name('page.viewname');
Route::get('/page/tambah/data', [PageController::class, 'tambah'])->name('tambah.data');
Route::post('/page/simpan/data', [PageController::class, 'simpan'])->name('simpan.data');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::get('/posts/list', [PostController::class, 'index'])->name('posts.list');
    Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
    // Route::patch('/posts/update/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::put('/posts/update/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
    Route::delete('/posts/delete/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
});
