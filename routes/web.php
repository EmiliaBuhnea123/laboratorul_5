<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\HomeController;
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

Route::get('/about', function () {
    return view('about');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

//sarcina 3.2
// Route::get('/tasks', [TaskController::class, 'index']);
// Route::get('/tasks/create', [TaskController::class, 'create']);
// Route::post('/tasks', [TaskController::class, 'store']);
// Route::get('/tasks/{id}', [TaskController::class, 'show']);
// Route::get('/tasks/{id}/edit', [TaskController::class, 'edit']);
// Route::put('/tasks/{id}', [TaskController::class, 'update']);
// Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);


// Route::controller(TaskController::class)->prefix('tasks')->group(function () {
//     Route::get('/', 'index')->name('tasks.index'); 
//     Route::get('/create', 'create')->name('tasks.create'); 
//     Route::post('/', 'store')->name('tasks.store');
//     Route::get('/{id}', 'show')->name('tasks.show')->where('id', '[0-9]+');
//     Route::get('/{id}/edit', 'edit')->name('tasks.edit')->where('id', '[0-9]+');
//     Route::put('/{id}', 'update')->name('tasks.update')->where('id', '[0-9]+');
//     Route::delete('/{id}', 'destroy')->name('tasks.destroy')->where('id', '[0-9]+'); 
//    });

Route::resource('tasks', TaskController::class)
    ->only(['index', 'show', 'create', 'edit', 'destroy', 'update', 'store']);

    Route::resource('tasks.comments', CommentController::class)
    ->only(['index', 'show', 'store']);

