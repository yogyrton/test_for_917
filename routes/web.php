<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::prefix('login')->group(function (){
    Route::middleware('guest')->group(function (){
        Route::get('/', [LoginController::class, 'index'])->name('login');
        Route::post('/login_process', [LoginController::class, 'login'])->name('login_process');
    });

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
});


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/{cat}', [HomeController::class, 'showIdeaCategory'])->name('show_idea_category');
Route::post('/', [HomeController::class, 'showForm'])->name('show_form');
Route::post('/{cat}', [HomeController::class, 'showForm2'])->name('show_form2');



Route::fallback(function (){
    return redirect('login');
});
