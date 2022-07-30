<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;

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


Route::get('/', function () {

    return redirect('login');
//    return view('welcome');
});

Route::get('login', ['uses' => function () {
    return view('login');
}, 'as' => 'login']);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('/', [MainController::class, 'index']);
    Route::get('/temas-show', [AdminController::class, 'temas_show']);
    Route::get('/temas-add', [AdminController::class, 'temas_add']);
    Route::post('/temas-store', [AdminController::class, 'temas_store']);
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
