<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/posts', function () {
//     return view('index');
// });

// Route::get('/posts', [PostController::class, 'index']);



Route::resource('posts', PostController::class);
Route::post('/updatepost/{id}', [PostController::class, 'updatepost']);
Route::get('/post/new', [PostController::class, 'new']);
