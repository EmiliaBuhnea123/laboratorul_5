<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
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

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [HomeController::class, 'about'])->name('about');

    Route::resource('tasks', TaskController::class)
        ->only(['index', 'show', 'create', 'edit', 'destroy', 'update', 'store']);

    Route::resource('tasks.comments', CommentController::class)
        ->only(['index', 'show', 'store']);

    Route::get('tasks/profile/{id}', [ProfileController::class, 'show'])->name('tasks.profile.show');
});

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/profiles', [AdminController::class, 'index'])->name('admin.profiles');


Route::controller(AuthController::class)->name('auth.')->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'storeRegister')->name('register.store');
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'storeLogin')->name('login.store');
    Route::delete('/logout', 'logout')->name('logout');
});

Route::get('/profile', [ProfileController::class, 'create'])->name('profile.create');
Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');
